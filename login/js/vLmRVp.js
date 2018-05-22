(function() {
  var button, buttonStyles, materialIcons;

  materialIcons = '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';

  buttonStyles = '<link href="http://codepen.io/andytran/pen/vLmRVp.css" rel="stylesheet">';

  button = '<a href="http://tegradesign.com" target="_blank"  class="at-button"><i class="material-icons">Tegra</i></a>';

  document.body.innerHTML += materialIcons + buttonStyles + button;

}).call(this);