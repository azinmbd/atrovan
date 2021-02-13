if (typeof String.prototype.endsWith !== 'function') {
  String.prototype.endsWith = function(suffix) {
      return this.indexOf(suffix, this.length - suffix.length) !== -1;
  };
}

if (!String.prototype.startsWith) {
String.prototype.startsWith = function(searchString, position) {
  position = position || 0;
  return this.indexOf(searchString, position) === position;
};
}

if (!Array.prototype.forEach) {

Array.prototype.forEach = function(callback/*, thisArg*/) {

  var T, k;

  if (this == null) {
    throw new TypeError('this is null or not defined');
  }

  // 1. Let O be the result of calling toObject() passing the
  // |this| value as the argument.
  var O = Object(this);

  // 2. Let lenValue be the result of calling the Get() internal
  // method of O with the argument "length".
  // 3. Let len be toUint32(lenValue).
  var len = O.length >>> 0;

  // 4. If isCallable(callback) is false, throw a TypeError exception.
  // See: http://es5.github.com/#x9.11
  if (typeof callback !== 'function') {
    throw new TypeError(callback + ' is not a function');
  }

  // 5. If thisArg was supplied, let T be thisArg; else let
  // T be undefined.
  if (arguments.length > 1) {
    T = arguments[1];
  }

  // 6. Let k be 0.
  k = 0;

  // 7. Repeat while k < len.
  while (k < len) {

    var kValue;

    // a. Let Pk be ToString(k).
    //    This is implicit for LHS operands of the in operator.
    // b. Let kPresent be the result of calling the HasProperty
    //    internal method of O with argument Pk.
    //    This step can be combined with c.
    // c. If kPresent is true, then
    if (k in O) {

      // i. Let kValue be the result of calling the Get internal
      // method of O with argument Pk.
      kValue = O[k];

      // ii. Call the Call internal method of callback with T as
      // the this value and argument list containing kValue, k, and O.
      callback.call(T, kValue, k, O);
    }
    // d. Increase k by 1.
    k++;
  }
  // 8. return undefined.
};
}

function toArray(obj) {
var array = [];
// iterate backwards ensuring that length is an UInt32
for (var i = obj.length >>> 0; i--;) {
  array[i] = obj[i];
}
return array;
}

function addClass (object, className) {
object.classList ? object.classList.add(className) : object.className += ' ' + className;
}

function removeAllClassesButFirst (component, skipClass) {
var classList = component.classList;
var componentClass = classList.item(0);
var toRemove = [];
var beforeComponent = true;
toArray(classList).forEach(function(className) {
  beforeComponent = beforeComponent && className != 'component'
  if (className != skipClass && className != componentClass && className != 'component' && !beforeComponent) {
    toRemove.push(className);
  }
});
toRemove.forEach(function(className) {
  classList.remove(className);
});
}

function applyState (component, stateClass) {
var componentClass = component.classList.item(0);
component.className = componentClass;
component.classList.add(stateClass);
}

function isCurrentState (component, state) {
var classList = component.classList;
var rv = false;
toArray(classList).forEach(function (className) {
  if (className.endsWith(state)) {
    rv = true;
  }
})
return rv;
}

function whichTransitionEvent(){
var t,
    el = document.createElement("fakeelement");

var transitions = {
  "transition"      : "transitionend",
  "OTransition"     : "oTransitionEnd",
  "MozTransition"   : "transitionend",
  "WebkitTransition": "webkitTransitionEnd"
}

for (t in transitions){
  if (el.style[t] !== undefined){
    return transitions[t];
  }
}
}


var transitionEvent = whichTransitionEvent();

// Javascript for component ciry animation
// Longest animation for Transition 1 is this;satellite
// Transition 1: From keyframe1 to keyframe2

function clickciryanimation1Handler(event) {
var component = document.querySelector('.ciry-animation');
if (isCurrentState(component, 'keyframe1')) {
  try {
  //  console.log('Listener for event: click triggered. State: keyframe1');
    setTimeout(function() {
      var component = document.querySelector('.ciry-animation');
      component.addEventListener(transitionEvent, transitionciryanimationkeyframe1tokeyframe2EndedHandler);
      removeAllClassesButFirst(component, 'keyframe1-to-keyframe2');
      addClass(component, 'keyframe2');
      addClass(component, 'keyframe1-to-keyframe2');
    }, 0);
  }
  catch (e) {
    console.log(e)
  }
}
}

function transitionciryanimationkeyframe1tokeyframe2EndedHandler(event) {

if (event.target.className.trim() == 'satellite' ||
    event.target.className.startsWith('satellite ')) {
  var component = document.querySelector('.ciry-animation');
  component.removeEventListener(transitionEvent, transitionciryanimationkeyframe1tokeyframe2EndedHandler);
  //console.log('transitionciryanimationkeyframe1tokeyframe2EndedHandler()');
  // animationend
  setTimeout(function () {
    var component = document.querySelector('.ciry-animation');
    component.addEventListener(transitionEvent, transitionciryanimationkeyframe2tokeyframe3EndedHandler);
    removeAllClassesButFirst(component, 'keyframe2-to-keyframe3');
    addClass(component, 'keyframe3');
    addClass(component, 'keyframe2-to-keyframe3');
  }, 0);
}
}



// Transition ciryanimation keyframe1-to-keyframe2 Event Listeners
  // click keyframe1 keyframe1
var component = document.querySelector('.ciry-animation');
component.addEventListener('click', clickciryanimation1Handler);

function resetciryanimation() {
  //console.log('reset');
  var component = document.querySelector('.ciry-animation');
  if (!component) { return; }
  component.addEventListener(transitionEvent, transitionciryanimationkeyframe1tokeyframe2EndedHandler);

  removeAllClassesButFirst(component, 'keyframe1-to-keyframe2');
  addClass(component, 'keyframe2');
  addClass(component, 'keyframe1-to-keyframe2');
}



// Javascript for component ciry animation
// Longest animation for Transition 2 is this;satellite
// Transition 2: From keyframe2 to keyframe3


function transitionciryanimationkeyframe2tokeyframe3EndedHandler(event) {

if (event.target.className.trim() == 'satellite' ||
    event.target.className.startsWith('satellite ')) {
  var component = document.querySelector('.ciry-animation');
  component.removeEventListener(transitionEvent, transitionciryanimationkeyframe2tokeyframe3EndedHandler);
  //console.log('transitionciryanimationkeyframe2tokeyframe3EndedHandler()');
  // animationend
  setTimeout(function () {
    var component = document.querySelector('.ciry-animation');
    component.addEventListener(transitionEvent, transitionciryanimationkeyframe3tokeyframe4EndedHandler);
    removeAllClassesButFirst(component, 'keyframe3-to-keyframe4');
    addClass(component, 'keyframe4');
    addClass(component, 'keyframe3-to-keyframe4');
  }, 0);
}
}



// Transition ciryanimation keyframe2-to-keyframe3 Event Listeners
  // animationend keyframe2 keyframe1

// Javascript for component ciry animation
// Longest animation for Transition 3 is this;car;fast
// Transition 3: From keyframe3 to keyframe4


function transitionciryanimationkeyframe3tokeyframe4EndedHandler(event) {

if (event.target.className.trim() == 'fast' ||
    event.target.className.startsWith('fast ')) {
  var component = document.querySelector('.ciry-animation');
  component.removeEventListener(transitionEvent, transitionciryanimationkeyframe3tokeyframe4EndedHandler);
  //console.log('transitionciryanimationkeyframe3tokeyframe4EndedHandler()');
  // animationend
  setTimeout(function () {
    var component = document.querySelector('.ciry-animation');
    component.addEventListener(transitionEvent, transitionciryanimationkeyframe4tokeyframe5EndedHandler);
    removeAllClassesButFirst(component, 'keyframe4-to-keyframe5');
    addClass(component, 'keyframe5');
    addClass(component, 'keyframe4-to-keyframe5');
  }, 0);
}
}



// Transition ciryanimation keyframe3-to-keyframe4 Event Listeners
  // animationend keyframe3 keyframe1

// Javascript for component ciry animation
// Longest animation for Transition 4 is this;car;turn
// Transition 4: From keyframe4 to keyframe5


function transitionciryanimationkeyframe4tokeyframe5EndedHandler(event) {

if (event.target.className.trim() == 'turn' ||
    event.target.className.startsWith('turn ')) {
  var component = document.querySelector('.ciry-animation');
  component.removeEventListener(transitionEvent, transitionciryanimationkeyframe4tokeyframe5EndedHandler);
  //console.log('transitionciryanimationkeyframe4tokeyframe5EndedHandler()');
  // animationend
  setTimeout(function () {
    var component = document.querySelector('.ciry-animation');
    component.addEventListener(transitionEvent, transitionciryanimationkeyframe5tokeyframe6EndedHandler);
    removeAllClassesButFirst(component, 'keyframe5-to-keyframe6');
    addClass(component, 'keyframe6');
    addClass(component, 'keyframe5-to-keyframe6');
  }, 0);
}
}



// Transition ciryanimation keyframe4-to-keyframe5 Event Listeners
  // animationend keyframe4 keyframe1

// Javascript for component ciry animation
// Longest animation for Transition 5 is this;satellite
// Transition 5: From keyframe5 to keyframe6


function transitionciryanimationkeyframe5tokeyframe6EndedHandler(event) {

if (event.target.className.trim() == 'satellite' ||
    event.target.className.startsWith('satellite ')) {
  var component = document.querySelector('.ciry-animation');
  component.removeEventListener(transitionEvent, transitionciryanimationkeyframe5tokeyframe6EndedHandler);
  //console.log('transitionciryanimationkeyframe5tokeyframe6EndedHandler()');
  lastTransitionciryanimationEndedHandler(event);
}
}


function lastTransitionciryanimationEndedHandler(event) {
//console.log('lastTransitionciryanimationEndedHandler()');
var component = document.querySelector('.ciry-animation');
removeAllClassesButFirst(component, 'keyframe1');
addClass(component, 'keyframe1');
var event = new Event('click');
setTimeout(function() {
  component.dispatchEvent(event);
}, 0);
}


// Transition ciryanimation keyframe5-to-keyframe6 Event Listeners
  // animationend keyframe5 keyframe1


// Start first animation transition of ciry-animation
(function() {
  var component = document.querySelector('.ciry-animation');
  var event = new Event('click');
  component.dispatchEvent(event);
})();