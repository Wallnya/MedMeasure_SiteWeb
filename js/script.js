const $element = $('input[type="range"]');
const $tooltip = $('#range-tooltip');
const sliderStates = [
  {name: "low", tooltip: "Il faudrait peut-être consulter un médecin", range: _.range(0, 33) },
  {name: "med", tooltip: "Vous y êtes presque, ne perdez pas espoir", range: _.range(33, 75)},
  {name: "high", tooltip: "Bravo ! Vous êtes apte à voler", range: _.range(75,100) },
];
var currentState;
var $handle;

$element
  .rangeslider({
    polyfill: false,
    onInit: function() {
      $handle = $('.rangeslider__handle', this.$range);
      updateHandle($handle[0], this.value);
      updateState($handle[0], this.value);
    }
  })
  .on('input', function() {
    updateHandle($handle[0], this.value);
    checkState($handle[0], this.value);
  });


// Update the value inside the slider handle
function updateHandle(el, val) {
  el.textContent = val;
}

// Check if the slider state has changed
function checkState(el, val) {
  // if the value does not fall in the range of the current state, update that shit.
  if (!_.contains(currentState.range, parseInt(val))) {
    updateState(el, val);
  }
}

// Change the state of the slider
function updateState(el, val) {
  for (var j = 0; j < sliderStates.length; j++){
    if (_.contains(sliderStates[j].range, parseInt(val))) {
      currentState = sliderStates[j];
    }
  }

  if (currentState.name == "low") {
    //window.location.href = "https://www.doctolib.fr/";
    document.getElementById("click").style.display="block";
  }
  else {
    document.getElementById("click").style.display="none";
  }
 
  // Update handle color
  $handle
    .removeClass (function (index, css) {
    return (css.match (/(^|\s)js-\S+/g) ||   []).join(' ');
  })
    .addClass("js-" + currentState.name);
  // Update tooltip
  $tooltip.html(currentState.tooltip);
}