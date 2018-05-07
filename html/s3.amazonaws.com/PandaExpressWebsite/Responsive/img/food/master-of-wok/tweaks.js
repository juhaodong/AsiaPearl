$(document).ready(function() {

function ShowProvince(provinceName) {

            var overlay = $("#map-overlay");
            overlay.css({ display: "block" });
            var province = $("<div></div>").addClass("province").css({ "background-image": "url(//s3.amazonaws.com/PandaExpressWebsite/Responsive/img/food/master-of-wok/china/" + provinceName + "/" + provinceName + ".png)" });

            var dishes = [
                    {
                        name: "Anhui-Eggplant-Tofu-Image",
                        offset: { top: "33%", left: "17%" },
                        image: "Anhui-Eggplant-Tofu-bio-Image-detail.jpg",
                        title: "Eggplant Tofu",
                        description: "In China, tofu and other soybean products are eaten not only by vegetarians, but also by almost everybody. Our Eggplant Tofu combines fried tofu with the buttery tenderness of eggplant with a sauce that's sweet, sour and savory.",
                        province: "Anhui"
                    },
                       {
                           name: "Beijing-Beef-image",
                           offset: { top: "33%", left: "17%" },
                           image: "Beijing-Beef-Bio-Image-detail.jpg",
                           title: "Beijing Beef",
                           description: "Beijing is renowned for its lamb and beef dishes, many of them associated with the city's ancient Muslim community. Our Beijing Beef is rooted in traditional <i>cuipi niurou</i> (crispy beef), but we've pepped up the sauce with a hint of chili heat.",
                           province: "Beijing"
                       },
                        {
                            name: "Chow-Mein-Image",
                            offset: { top: "41%", left: "17%" },
                            image: "Chow-Mein-profile-Image.png",
                            title: "Chow Mein",
                            description: "Our Chow Mein is inspired by the noodles of Taishan. The word <i>chow mein</i> comes from the Taishan dialect for \"stir-fried noodles\".",
                            province: "Guangdong",
                        },
                         {
                             name: "Sweet-Fire-Chicken-Image",
                             offset: { top: "26%", left: "38%" },
                             image: "Sweet-Fire-Chicken-Image-detail.jpg",
                             title: "SweetFire Chicken Breast",
                             description: "Our SweetFire Chicken Breast is inspired by a dish the Cantonese call <i>gulou yuk</i>; a sweet, colorful confection of slices of pork in a glossy sweet-and-sour sauce perked up with pineapple, onion and sweet pepper. We've swapped chicken for pork, and added a spicy edge to our sauce.",
                             province: "Guangdong",
                         },

                          {
                              name: "Black-Pepper-Chicken-Image",
                              offset: { top: "44%", left: "38%" },
                              image: "Black-Pepper-Chicken-Profile-Image-detail.png",
                              title: "Black Pepper Chicken",
                              description: "Black pepper sauces are popular in places with European influences, particularly Hong Kong. Our Black Pepper Chicken has a classic Hong Kong black pepper sauce livened up with fresh and crunchy vegetables.",
                              province: "Hong-Kong"
                          },
                            {
                                name: "Broccoli-Beef-Image",
                                offset: { top: "27%", left: "20%" },
                                image: "Broccoli-Beef-Profile-Image-detail.png",
                                title: "Broccoli Beef",
                                description: 'Our Broccoli Beef takes a cue from Hong Kong cooking, where sliced beef may be stir-fried in a sauce enriched by oyster sauce, and complemented by a vibrant green vegetable such as Chinese broccoli (<i>jie lan</i>) or water spinach. The Cantonese are brilliant at the art of stir-frying, and in particular, at marinating and tenderizing meat so that it keeps its silken tenderness.',
                                province: "Hong-Kong"
                            },
                            {
                                name: "Grilled-Teryaki-Chicken-Image",
                                offset: { top: "13%", left: "6%" },
                                image: "Grilled-Teriyaki-Chicken-Profile-Image-detail.png",
                                title: "Grilled Teriyaki Chicken",
                                description: "In Hong Kong cooking, you'll find pork chops and large pieces of chicken due to the territory's long history of contact with European food cultures. Often times, meat is served over rice with a sauce either drizzled on top or on the side. Our Grilled Teriyaki Chicken is inspired by the East-Meets-West Hong Kong-style chicken steak; we've paired it with its own Japanese teriyaki sauce.",
                                province: "Hong-Kong"
                            },
                            {
                                name: "Honey-Walnut-Shrimp-Image",
                                offset: { top: "28%", left: "57%" },
                                image: "Honey-Walnut-Shrimp-Profile-Image-detail.png",
                                title: "Honey Walnut Shrimp",
                                description: "Our Honey Walnut Shrimp pairs classic northern Chinese cooking technique with mayonnaise in a nod to Hong Kong's fusion flavors. In Hong Kong, many British sauces have been absorbed into the local cuisine. Here, mayonnaise adds a richness to our honeyed sauce. According to legend, walnuts are one of the Central Asian foods brought into China along the Silk Road, and are still widely grown in northern China today.",
                                province: "Hong-Kong"
                            },
                            {
                                name: "Fried-Rice-Image",
                                offset: { top: "31%", left: "37%" },
                                image: "Fried-Rice-Profile-Image-detail.png",
                                title: "Fried Rice",
                                description: "Our Fried Rice is a simplified version of the famous Yangzhou egg-fried rice that recalls its ancient ancestor, the 'rice with golden fragments' of egg mentioned in a Sui Dynasty text.",
                                province: "Yangzhou"
                            },
                            {
                                name: "String-Bean-Chicken-Image",
                                offset: { top: "16%", left: "37%" },
                                image: "String-Bean-Chicken-Profile-Image-detail.png",
                                title: "String Bean Chicken Breast",
                                description: "Our String Bean Chicken Breast is inspired by <i>jiachang</i> (homestyle) Chinese dishes. In Chinese home cooking, meat ingredients are often stir-fried with vegetables, both to make the meat go further and for the sake of a healthy balance.",
                                province: "Hong-Kong"
                            },

                            {
                                name: "Shanghai-Angus-Steak-Image",
                                offset: { top: "31%", left: "46%" },
                                image: "Shanghai-Angus-Steak-Profile-Image-profile.png",
                                title: "Shanghai Angus Steak",
                                description: "Shanghai has been an international city since the mid-nineteenth century and renowned for its audacious mixing of cultural influences. In this spirit, we've borrowed a few tips from Shanghai red-braising, namely its soy sauce and sugar, to cook our Angus Steak. We've added crisp asparagus and juicy mushrooms for freshness and texture.",
                                province: "Shanghai"
                            },
                            
                             {
                                 name: "Kung-Pao-Chicken-Image",
                                 offset: { top: "31%", left: "46%" },
                                 image: "KungPaoChicken_detail.jpg",
                                 title: "Kung Pao Chicken ",
                                 description: "Kung Pao Chicken is a specialty of the Sichuan capital Chengdu. It's a savory tumble of succulent chicken in a glossy sauce flavored with scorched chili, ginger, garlic and green onion, with the pleasant crispness of roasted peanuts that provides a textural contrast to the juicy meat. We add crunchy vegetables for freshness.",
                                 province: "Sichuan"
                             },

                            {
                                name: "Orange-Chicken-Image",
                                offset: { top: "37%", left: "20%" },
                                image: "Orange-Chicken-Profile-Image-detail.png",
                                title: "Orange Chicken",
                                description: "The Original Orange Chicken is inspired by a well-known appetizer called <i>chenpi niurou</i> (tangerine peel beef), in which slices of boneless beef are marinated, deep-fried and then wok-cooked with dried chillies, Sichuan pepper and tangerine peel. We've substituted chicken for beef, and introduced a heady element of sweet and sour alongside the citrus and chilli notes.",
                                province: "Sichuan"
                            },

                             {
                                 name: "Mushroom-Chicken-Image",
                                 offset: { top: "37%", left: "20%" },
                                 image: "Mushroom-Chicken-Bio-Image-profile.png",
                                 title: "Mushroom Chicken",
                                 description: "Yunnan Province in southwestern China is famed for its extraordinary diversity of wild mushrooms. Chicken and mushrooms are a classic combination in Chinese cookery, in soups, stews, stir-fries and dumpling stuffing. In this dish, we bring together succulent chicken and fresh mushrooms in a gently savory sauce infused with the subtle fragrance of ginger and garlic. We've added zucchini for a burst of fresh, green crispness.",
                                 province: "Yunnan"
                             }


            ];

            $.each(dishes, function (i, dishInfo) {
                if (dishInfo.province == provinceName) {
                    var dish = $("<div></div>")
                        .prop("id", dishInfo.name)
                        .data("info", dishInfo)
                        .data("provinceName", provinceName)
                        .addClass("dish").css({
                            "background-image": "url(//s3.amazonaws.com/PandaExpressWebsite/Responsive/img/food/master-of-wok/china/" + provinceName + "/" + dishInfo.name + ".png)",
                            top: dishInfo.offset.top,
                            left: dishInfo.offset.left
                        });
                    province.append(dish);
                }
            });

            province.data("dishes", dishes);
            overlay.append(province);
        };


$("select.province").change(function (e) {
            var provinceSelect = $("select.province#regions");
            if (provinceSelect.val() === "none") return;

            var el = $("div.slide#chinese-origins");
            $(el).find("div.province").remove();
            ShowProvince(provinceSelect.val());
        });

        //Handle China map clicks
        $("svg#china-map-svg").click(function (e) {
            var svg = $(e.currentTarget);
            var provinceName = $(e.target).prop("id");
            if (!provinceName) return;
            if (provinceName == "china-map-svg") return;
            ShowProvince(provinceName)
        });

});

var loadBestOfBothWoks = function (callback) {
        var left = $("#best-of-both-woks > div > div.left");
        left.load("/menu/bestofbothwoks", function () {
            if (callback) callback();
	    betterMeals.splice(-1, 1);
        });
    };
