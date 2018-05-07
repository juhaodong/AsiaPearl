/*global NovaDine, Ext, google, ndga */

Ext.namespace('NovaDine.storelocator');

NovaDine.storelocator.app = (function () {

    var messages = {
        inactive_text: window.locator_inactive_text != null ?
            window.locator_inactive_text :
            ('Online ordering is not available at this location.' +
             '<br>Please call the store to place your order.'),
        inactive_text_short: window.locator_inactive_text_short != null ?
            window.locator_inactive_text_short :
            (window.locator_inactive_text != null ?
             window.locator_inactive_text :
             'Online ordering is not available, please call to order.')
    };

    var send_ga_event = ndga.bind(ndga, 'send', 'event', 'Location Search');

    var startOrder = function (restaurantid) {
        var startOrderURL =
            document.location.protocol + '//' +
            document.location.host.replace(/^api\./, '') +
            '/mp/pub/start?restid=' + restaurantid;
        if (service_type) {
            startOrderURL = startOrderURL + '&servicetype=' + service_type;
        }
        top.location = startOrderURL;

        // This is how to embed the OrderWizard, but has security issues
        // with some configurations of Internet Explorer:
        //
        // var wizard = new NovaDine.OrderWizard({
        //     restaurantId: restaurantid
        // });
        // var window = new Ext.Window({
        //     renderTo: Ext.getBody(),
        //     baseCls: 'x-box',
        //     modal: true,
        //     resizable: false,
        //     closable: false,
        //     items: [wizard]
        // });
        // window.show();
    };

    var map, infoWindow;

    var shouldPreferActive = false;

    var service_type;

    var _ = function (msg) {
        return msg;
    };

    var log = function () {
        try { console.log.apply(console, arguments); } catch (e) { }
    };


    var isActive = function (rest) {
        if (!rest || !rest.active) {
            return false;
        }
        if (!rest.services || rest.services.length === 0) {
            return false;
        }
        if (window.servicetype) {
            var haveServiceType = false;
            Ext.each(rest.services, function (r) {
                if (r.service_type_id == window.servicetype) {
                    haveServiceType = true;
                }
            });
            if (!haveServiceType) {
                return false;
            }
        }
        return true;
    };


    var cleanRestaurantName = function (name) {
        return name.replace(/^Quiznos\s*(-\s*)?/, '');
    };


    var cleanBusinessHours = function (rest) {
        hours = rest.businesshours;
        if (!hours || (hours === 'Closed' && !isActive(rest))) {
            return '';
        }
        return hours;
    };


    var restaurantBoxTemplate = new Ext.XTemplate(
        '<div class="restaurantbox {extraClass}">',
        '  <div class="badges">',
        '    <tpl for="badges">',
        '      <div class="badge">',
        '        <tpl if="values.badge_url">',
        '          <a href="{values.badge_url}" target="_blank">',
        '        </tpl>',
        '        <img src="/images_menus/badge_{values.badge_name}" title="{values.badge_name}">',
        '        <tpl if="values.badge_url">',
        '          </a>',
        '        </tpl>',
        '      </div>',
        '    </tpl>',
        '  </div>',
        '  <tpl if="show_rest_name">',
        '    <div class="name">{letter}{name}</div>',
        '  </tpl>',
        '  <div class="address">',
        '    <tpl if="show_number && !promoText">',
        '      <div>Store #{storeId}</div>',
        '    </tpl>',
        '    <div>{address1}</div>',
        '    <div>{city}, {statecode} {zipcode}',
        '    <div>{phone}</div>',
        '  </div>',
        '  <tpl if="businessHours">',
        '    <div class="hours">',
        '      {hoursToday}<br>',
        '      <span>{businessHours}</span>',
        '    </div>',
        '  </tpl>',
        '  <tpl if="active">',
        '    <tpl if="promoText"><div class="promo_text">{promoText}</div></tpl>',
        '    <div class="ordernow">{orderNow}</div>',
        '  </tpl>',
        '  <tpl if="!active">',
        '    <div class="callToOrder">{callToOrder}</div>',
        '  </tpl>',
        '</div>').compile();

    var createRestaurantBox = function (index, rest) {
        var active = isActive(rest);
        return restaurantBoxTemplate.apply({
            letter: index !== false && index < 26 ?
                (String.fromCharCode("A".charCodeAt(0) + index) + ') ') : '',
            extraClass: "restaurantbox-" + (index % 2 ? "even" : "odd"),
            name: cleanRestaurantName(rest.restaurantname),
            show_number: show_store_number,
            show_rest_name: show_rest_name,
            service_type: service_type,
            storeId: rest.storeid,
            address1: rest.address1,
            address2: rest.address2,
            city: rest.city,
            statecode: rest.statecode,
            zipcode: rest.zipcode,
            phone: rest.phone,
            active: active,
            badges: rest.badges || [],
            deliveryAvailable: active && rest.deliveryavailable ?
                _('Delivery Available') : '',
            acceptsCoupons: rest.accepts_coupons ? _('Accepts Coupons') : '',
            hoursToday: _("Today's Hours"),
            businessHours: cleanBusinessHours(rest),
            orderNow: _('Order Now'),
            callToOrder: _(messages.inactive_text_short),
            promoText: rest.promo_text
        });
    };


    var infoElementTemplate = new Ext.XTemplate(
        '<div class="infoWindow">',
        '<tpl if="show_rest_name">',
        '<div class="name">{name}</div>',
        '</tpl>',
        '<div class="address">',
        '<div>{address1}</div>',
        '<tpl if="address2"><div>{address2}</div></tpl>',
        '<div>{city}, {statecode}  {zipcode}</div>',
        '<div>{phone}</div>',
        '<tpl if="businessHours">',
        '<div class="hours">{hoursToday}: <span>{businessHours}</span></div>',
        '</tpl>',
        '<tpl if="!active">',
        '<div class="callToOrder">{callToOrder}</div>',
        '</tpl>',
        '</div>',
        '<tpl if="promoText"><div class="promo_text">{promoText}</div></tpl>',
        '<ul class="actions">',
        '<li><a class="viewMenu" target="_top" href="{viewMenuURL}">{viewMenu}</a>',
        '<tpl if="active">',
        '<li><a class="startOrder" target="_top" href="{startOrderURL}">{startOrder}</a>',
        '</tpl>',
        '<tpl if="!active">',
        '<li class="disabledStartOrder">{startOrder}</li>',
        '</tpl>',
        '</ul>',
        '</div>').compile();

    var createInfoElement = function (rest) {
        var viewMenuURL = document.location.protocol + '//' +
            document.location.host.replace(/^api\./, '') +
            '/mp/pub/menu?restid=' + rest.restaurantid;
        var startOrderURL = document.location.protocol + '//' +
            document.location.host.replace(/^api\./, '') +
            '/mp/pub/start?restid=' + rest.restaurantid;
        if (service_type) {
            startOrderURL = startOrderURL + '&servicetype=' + service_type;
        }
        return infoElementTemplate.apply({
            name: cleanRestaurantName(rest.restaurantname),
            address1: rest.address1,
            address2: rest.address2,
            city: rest.city,
            statecode: rest.statecode,
            zipcode: rest.zipcode,
            phone: rest.phone,
            hoursToday: _("Today's Hours"),
            businessHours: cleanBusinessHours(rest),
            active: isActive(rest),
            viewMenu: _('View menu'),
            viewMenuURL: viewMenuURL,
            startOrder: _('Start an order'),
            startOrderURL: startOrderURL,
            callToOrder: _(messages.inactive_text),
            promoText: rest.promo_text
        });
    };



    var createMarker = function (map, point, index) {
        var marker, letter;

        if (index !== false && index < 26) {
            letter = String.fromCharCode("A".charCodeAt(0) + index);
        }
        else {
            letter = "+";
        }

        marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: 'https://chart.googleapis.com/chart?chst=d_map_pin_letter' +
                  '&chld=' + letter + '|DE8877|000000'
        });

        return marker;
    };


    var selectRestaurant = function (rest) {
        Ext.select("#resultsContainer .selected").removeClass("selected");
        rest.box.addClass("selected");
        rest.box.scrollIntoView(Ext.get('resultsContainer'), false);

        map.panTo(rest.point);
        infoWindow.setContent(createInfoElement(rest));
        infoWindow.setPosition(rest.point);
        infoWindow.open(map);

        send_ga_event(
            'Restaurant Selected', 'RestID ' + rest.restid, rest.index);
    };


    var showSearchMessage = function (messageHTML) {
        var html =
            '<div class="restaurantbox selected">' +
            '  <div class="message">' + messageHTML + '</div>' +
            '</div>';
        Ext.get('resultsContainer').update(html);
    };

    var updateSearchResults = function (data) {
        updateSearchResults_really(data, false);
    };

    var updateSearchResults_bulk = function (data) {
        updateSearchResults_really(data, false);
    };

    var updateSearchResults_really = function (data, selectFirst) {
        var container = Ext.get('resultsContainer');
        var useIndex;

        if (!(data.length && data.length > 0)) {
            showSearchMessage(
                _("No stores were found matching your search." +
                    " Please check to make sure you entered" +
                    " everything correctly."));
            send_ga_event('No Restaurants Found');
            return;
        }

        if (shouldPreferActive) {
            data = sortActiveToTop(data);
        }

        var deliveryCount = 0, pickupCount = 0, totalCount = 0;
        Ext.each(data, function (r) {
            totalCount++;
            if (isActive(r) && r.deliveryavailable) {
                deliveryCount++;
            }
            if (isActive(r) && r.pickupavailable) {
                pickupCount++;
            }
        });
        send_ga_event('Restaurants Found', null, totalCount);
        send_ga_event('Pick-Up Restaurants Found', null, pickupCount);
        send_ga_event('Delivery Restaurants Found', null, deliveryCount);

        container.update('');
        useIndex = data.length <= 26;
        var bounds = map.getBounds(), bounds_were_updated = false;
        Ext.each(data, function (rest, index) {
            var point, marker, box;

            // log("restaurant:", rest);

            rest.index = index;

            point = new google.maps.LatLng(rest.latitude, rest.longitude);
            if (index === 0) {
                if (bounds && !bounds.contains(point)) {
                    bounds.extend(point);
                    bounds_were_updated = true;
                }
            }
            marker = createMarker(map, point, useIndex && index, rest);
            google.maps.event.addListener(marker, "click", function () {
                selectRestaurant(rest);
            });
            rest.point = point;
            rest.marker = marker;

            box = container.createChild(
                createRestaurantBox(useIndex && index, rest));
            rest.box = box;
            rest.loaded = false;
            box.on('click', function () {
                selectRestaurant(rest);
            });
            box.select('.ordernow').on('click', function () {
                startOrder(rest.restaurantid);
            });
        });

        if (bounds_were_updated) {
            map.fitBounds(bounds);
        }

        if (selectFirst) {
            selectRestaurant(data[0]);
        }
    };


    var sortCityToTop = function (data, cityName, stateCode) {
        var top = [], bottom = [];
        Ext.each(data, function (rest) {
            if (rest.city == cityName && rest.statecode == stateCode) {
                top.push(rest);
            } else {
                bottom.push(rest);
            }
        });

        return top.concat(bottom);
    };

    var sortActiveToTop = function (data) {
        var top = [], bottom = [];
        Ext.each(data, function (r) {
            if (isActive(r) && (r.deliveryavailable || r.pickupavailable)) {
                top.push(r);
            } else {
                bottom.push(r);
            }
        });
        return top.concat(bottom);
    };


    var search = function (latitude, longitude, place, failQuietly) {
        var state, city, postal_code;

        showSearchMessage(_("Searching..."));

        if (place && place.storeId) {
            map.setCenter(new google.maps.LatLng(37.0625, -95.677068));
            map.setZoom(4);
        }
        else if (place) {
            var components, i, ii;
            components = place.address_components;
            for (i = 0, ii = components.length; i < ii; i++) {
                var comp = components[i];
                if (comp.types.indexOf('postal_code') >= 0) {
                    postal_code = comp.short_name;
                } else if (comp.types.indexOf('locality') >= 0) {
                    city = comp.short_name;
                } else if (comp.types.indexOf('administrative_area_level_1') >= 0) {
                    state = comp.short_name;
                }
            }
            map.fitBounds(place.geometry.viewport);
        }
        else {
            map.setCenter(new google.maps.LatLng(latitude, longitude));
            map.setZoom(11);
        }

        if (postal_code) {
            send_ga_event('Search for Postal Code', postal_code);
            Ext.Ajax.request({
                url: "/mp/ndXTAL/searchByPostalCode_JSON",
                params: {
                    postalCode: "'" + postal_code + "'",
                    distanceInMiles: distance,
                    limit: 26
                },
                scope: this,
                success: function (response) {
                    var data = Ext.decode(response.responseText);
                    updateSearchResults(data);
                },
                failure: function () {
                    if (failQuietly) {
                        handleEmptySearch();
                    } else {
                        showSearchMessage(
                            _("There was an error searching for locations." +
                                " Please try again later."));
                    }
                }
            });
        }
        else if (state && city) {
            send_ga_event('Search for City', city + ', ' + state);
            Ext.Ajax.request({
                url: "/mp/ndXTAL/searchByGeoCode_JSON",
                params: {
                    latitude: latitude,
                    longitude: longitude,
                    distanceInMiles: distance,
                    limit: 26
                },
                scope: this,
                success: function (response) {
                    var data = Ext.decode(response.responseText);
                    data = sortCityToTop(data, city, state);
                    updateSearchResults(data);
                },
                failure: function () {
                    if (failQuietly) {
                        handleEmptySearch();
                    } else {
                        showSearchMessage(
                            _("There was an error searching for locations." +
                                " Please try again later."));
                    }
                }
            });
        }
        else if (state) {
            showSearchMessage(_("Fetching all stores in " + state + ", stand by..."));
            send_ga_event('Search for State', state);
            Ext.Ajax.request({
                url: "/mp/ndXTAL/searchByStateCode_JSON",
                params: {
                    stateCode: "'" + state + "'"
                },
                scope: this,
                success: function (response) {
                    var data = Ext.decode(response.responseText);
                    updateSearchResults_bulk(data);
                },
                failure: function () {
                    if (failQuietly) {
                        handleEmptySearch();
                    } else {
                        showSearchMessage(
                            _("There was an error searching for locations." +
                                " Please try again later."));
                    }
                }
            });
        }
        else if (place && place.storeId) {
            send_ga_event('Search by Store ID', place.storeId);
            Ext.Ajax.request({
                url: "/mp/ndXTAL/searchByStoreId_JSON",
                params: {
                    storeId: "'" + place.storeId + "'"
                },
                scope: this,
                success: function (response) {
                    var data = Ext.decode(response.responseText);
                    updateSearchResults(data);
                },
                failure: function () {
                    if (failQuietly) {
                        handleEmptySearch();
                    } else {
                        showSearchMessage(
                            _("There was an error searching for locations." +
                                " Please try again later."));
                    }
                }
            });
        }
        else {
            send_ga_event('Search for Geo Code');
            Ext.Ajax.request({
                url: "/mp/ndXTAL/searchByGeoCode_JSON",
                params: {
                    latitude: latitude,
                    longitude: longitude,
                    distanceInMiles: distance,
                    limit: 26
                },
                scope: this,
                success: function (response) {
                    var data = Ext.decode(response.responseText);
                    updateSearchResults(data);
                },
                failure: function () {
                    if (failQuietly) {
                        handleEmptySearch();
                    } else {
                        showSearchMessage(
                            _("There was an error searching for locations." +
                                " Please try again later."));
                    }
                }
            });
        }
    };


    var handleEmptySearch = function (message) {
        var point;

        message = message || _("Enter your location to find a " + window.ndChainName + " near you.");
        showSearchMessage(message);

        point = new google.maps.LatLng(37.0625, -95.677068);
        map.setCenter(point);
        map.setZoom(4);

        Ext.get('searchBox').focus();
    };


    var freeFormSearch = function () {
        Ext.get('resultsContainer').update('');

        var address = Ext.get('searchBox').getValue();
        if (!address) {
            handleEmptySearch();
            return false;
        }

        var storeIdMatch = /^\s*#(\d+)\s*$/.exec(address);
        if (storeIdMatch) {
            var place = {
                storeId: storeIdMatch[1]
            };
            Ext.get('searchBox').set({
                value: '#' + place.storeId
            });
            search(null, null, place, false);
            return;
        }


        var request = {
            address: address
        };

        function callback(results, status) {
            if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
                //FIXME: message wording
                handleEmptySearch(
                    _("<p>We were not able to find a location matching" +
                        " your request.</p>" +
                        "<p>Please check your search.</p>"));
                return;
            }
            if (status != google.maps.GeocoderStatus.OK || !results) {
                //FIXME: message wording
                handleEmptySearch(
                    _("<p>There was a problem finding your location." +
                        "<p>Please check your search or try again later.</p>"));
                return;
            }

            var place = results[0];
            Ext.get('searchBox').set({
                value: place.formatted_address.replace(', USA', '')
            });
            search(place.geometry.location.lat(),
                   place.geometry.location.lng(),
                   place,
                   false);
        }

        var geocoder = new google.maps.Geocoder();
        geocoder.geocode(request, callback);

        return false;
    };


    return {
        init: function () {
            var params = Ext.urlDecode(window.location.search.substring(1));
            var location = "", userInfo = {};

            var enableTouch = function () {
                var pane = Ext.get('resultsContainer').dom;
                var offset;
                pane.ontouchstart = function (e) {
                    var touch;
                    if (e.touches.length == 1) {
                        touch = e.touches[0];
                        offset = pane.scrollTop + touch.pageY;
                    } else {
                        offset = null;
                    }
                };
                pane.ontouchmove = function (e) {
                    var touch;
                    if (e.touches.length == 1 && offset !== null) {
                        e.preventDefault();
                        touch = e.touches[0];
                        pane.scrollTop = offset - touch.pageY;
                    }
                };
            };
            if (Ext.isWebKit) {
                enableTouch();
            }

            var mapOptions = {
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                center: google.maps.LatLng(37.0625, -95.677068),
                zoom: 4
            };
            map = new google.maps.Map(document.getElementById("map"),
                                      mapOptions);
            infoWindow = new google.maps.InfoWindow();

            google.maps.event.addListener(map, 'infowindowopen', function () {
                var containers = map.getInfoWindow().getContentContainers();
                Ext.each(containers, function (c) {
                    var el = Ext.get(c, true);
                    el.select('.startOrder').on('click', function (e) {
                        var href = e.getTarget().href;
                        var m = /restid=(\d+)/.exec(href);
                        if (m) {
                            e.preventDefault();
                            startOrder(m[1]);
                        }
                    });

                    var link = el.select('.disabledStartOrder', true);
                    var callToOrder = el.select('.callToOrder', true);
                    link.on('mouseenter', function () {
                        callToOrder.addClass('callToOrderHighlighted');
                    });
                    link.on('mouseout', function () {
                        callToOrder.removeClass('callToOrderHighlighted');
                    });
                });
            });

            if (params.prefer_active) {
                shouldPreferActive = params.prefer_active;
            }

            if (params.servicetype) {
                service_type = params.servicetype;
            }

            if (params.latitude && params.longitude) {
                search(params.latitude, params.longitude, null, true);
                return;
            }

            if (params.location) {
                location = params.location.replace(/^City, [A-Z][A-Z] /, '');
            } else {
                if (params.address) {
                    location += ", " + params.address;
                }
                if (params.city) {
                    location += ", " + params.city;
                }
                if (params.state) {
                    location += ", " + params.state;
                }
                if (params.zipCode) {
                    location += ", " + params.zipCode;
                }
                location = location.substring(2);
            }

            if (!location && window.returningUserInfo) {
                userInfo = window.returningUserInfo;
                if (userInfo.latitude && userInfo.longitude) {
                    search(userInfo.latitude, userInfo.longitude, null, true);
                    return;
                }
            }

            if (!location && window.locator_default_location) {
                location = window.locator_default_location;
            }

            if (!location && google && google.loader && google.loader.ClientLocation) {
                search(google.loader.ClientLocation.latitude,
                       google.loader.ClientLocation.longitude,
                       null, true);
                return;
            }

            if (location) {
                Ext.get('searchBox').set({value: location});
            }

            freeFormSearch();
        }
    };
})();
