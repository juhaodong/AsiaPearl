
function $() 
{
  console.warn('Using $() from compat.js');
  if (window.TraceKit) {
      try {
          TraceKit.report(new Error('Using $() from compat.js'));
      }
      catch (e) {
      }
  }

	 var elements = new Array();
	 for (var i = 0; i < arguments.length; i++) 
	 {
		  var element = arguments[i];
		  if (typeof element == 'string')
		  {
			   element = document.getElementById(element);
		  }
		  if (arguments.length == 1)
		  {
			   return element;
		  }
		  elements.push(element);
	 }
	 return elements;
}

var serverURL = '';


var activeMenu = null;

function showCategoryMenu() {
   if(activeMenu)
   {
      activeMenu.className = "collapsed";
      getNextSiblingByElement(activeMenu).style.display = "none";
   }
   if(this == activeMenu)
   {
      activeMenu = null;
   }
   else
   {
      this.className = "expanded";
      getNextSiblingByElement(this).style.display = "block";
      activeMenu = this;
   }
   return false;
}

function initCategoryMenu() {
   var menus, menu, text, a, i;
   menus = getChildrenByElement(document.getElementById("category"));
   for(i = 0; i < menus.length; i++)
   {
      menu = menus[i];
      text = getFirstChildByText(menu);
                  if(!text){ continue; }
      a = document.createElement("a");
      menu.replaceChild(a, text);
      a.appendChild(text);
      a.href = "#";
      a.onclick = showCategoryMenu;
      if (menu.className == 'currentcategory') {
          a.className = 'expanded';
          activeMenu = a;
      } else {
          a.className = 'collapsed';
      }
      a.onfocus = function() { this.blur(); };
   }
}

var num_onAddItemActions = 0;
var onAddItemActions = new Array( 100 );
var cancelPressed = false;

function add_onAddItemAction( func ) {
  onAddItemActions[num_onAddItemActions] = func;
  num_onAddItemActions++;
}


function exec_onAddItemActions( theForm ) {
  var action_idx = 0;

  if(cancelPressed)
  {
    return true;
  }

  for( action_idx=0; action_idx<num_onAddItemActions; action_idx++ ) {
    retval = (onAddItemActions[action_idx])( );
    if (!retval)
      return false;
  }
  return true;
}

function updateModifierSizes(sizeId)
{
  require(["jquery"], function ($) {
    var nc = ".mod_size_" + sizeId;
    $(".mod_size_dependent:not(" + nc + ")")
       .hide()
       .find("input")
       .prop("checked", false);
    $(nc).show();
  });
}


if(!window.Node){
  var Node = {ELEMENT_NODE : 1, TEXT_NODE : 3};
}

function checkNode(node, filter){
  return (filter == null || node.nodeType == Node[filter] || node.nodeName.toUpperCase() == filter.toUpperCase());
}

function getChildren(node, filter){
  var result = new Array();
  var children = node.childNodes;
  for(var i = 0; i < children.length; i++){
    if(checkNode(children[i], filter)) result[result.length] = children[i];
  }
  return result;
}

function getChildrenByElement(node){
  return getChildren(node, "ELEMENT_NODE");
}

function getFirstChild(node, filter){
  var child;
  var children = node.childNodes;
  for(var i = 0; i < children.length; i++){
    child = children[i];
    if(checkNode(child, filter)) return child;
  }
  return null;
}

function getFirstChildByText(node){
  var val = getFirstChild(node, "TEXT_NODE");
  if(val.nodeValue.replace(/^\s+|\s+$/g, ''))
  {
    return val;
  }
  return false;
}

function getNextSibling(node, filter){
  for(var sibling = node.nextSibling; sibling != null; sibling = sibling.nextSibling){
    if(checkNode(sibling, filter)) return sibling;
  }
  return null;
}
function getNextSiblingByElement(node){
        return getNextSibling(node, "ELEMENT_NODE");
}