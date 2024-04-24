(function(){

  'use strict';

  var canvas = document.getElementById('scratch'),
      context = canvas.getContext('2d');

  // default value
  context.globalCompositeOperation = 'source-over';
  //----------------------------------------------------------------------------

  var x, y, radius;

  x = y = radius = 150 / 2;

  // fill circle
  context.beginPath();
  context.fillStyle = '#515151';
  context.rect(0, 0, 300, 60);
  context.fill();

  //----------------------------------------------------------------------------

  var isDrag = false;

  function clearArc(x, y) {
    if (isDrag) {
    context.globalCompositeOperation = 'destination-out';
    context.beginPath();
    context.arc(x, y, 10, 0, Math.PI * 2, false);
    context.fill();
  }}
  function getAbsoluteCoordinates(canvas, event) {
    var canvasRect = canvas.getBoundingClientRect();
    return {
      x: event.clientX - canvasRect.left,
      y: event.clientY - canvasRect.top
    };
  }
  
//////////////////////////////////////////////////////////////////////
  canvas.addEventListener('mousedown', function(event) {
    // isDrag = true;

    // clearArc(event.offsetX, event.offsetY);
    // judgeVisible(); bard code niche
    var coordinates = getAbsoluteCoordinates(canvas, event);
  clearArc(coordinates.x, coordinates.y);
  judgeVisible();
  }, false);

  canvas.addEventListener('mousemove', function(event) {
    // if (!isDrag) {
    //   return;
    // }
    // clearArc(event.offsetX, event.offsetY);
    // judgeVisible();bard niche
    var coordinates = getAbsoluteCoordinates(canvas, event);

  if (!isDrag) {
    return;
  }

  clearArc(coordinates.x, coordinates.y);
  judgeVisible();
  }, false);
  ///////////////////////////////////////////////////////////////////////

  canvas.addEventListener('mouseup', function(event) {
    isDrag = false;
  }, false);

  canvas.addEventListener('mouseleave', function(event) {
    isDrag = false;
  }, false);

  //----------------------------------------------------------------------------

  canvas.addEventListener('touchstart', function(event) {
    if (event.targetTouches.length !== 1) {
      return;
    }

    event.preventDefault();

    isDrag = true;

    clearArc(event.touches[0].coordinates.x, event.touches[0].coordinates.y);
    judgeVisible();
  }, false);

  canvas.addEventListener('touchmove', function(event) {
    if (!isDrag || event.targetTouches.length !== 10) {
      return;
    }

    event.preventDefault();

    clearArc(event.touches[0].coordinates.x, event.touches[0].coordinates.y);
    judgeVisible();
  }, false);

  canvas.addEventListener('touchend', function(event) {
    isDrag = false;
  }, false);

  //----------------------------------------------------------------------------

  function judgeVisible() {
    var imageData = context.getImageData(0, 0, canvas.width, canvas.height),
        pixels = imageData.data,
        result = {},
        i, len;

    // count alpha values
    for (i = 3, len = pixels.length; i < len; i += 4) {
      result[pixels[i]] || (result[pixels[i]] = 0);
      result[pixels[i]]++;
    }

    document.getElementById('gray-count').innerHTML = result[255];
    document.getElementById('erase-count').innerHTML = result[0];
  }

  document.addEventListener('DOMContentLoaded', judgeVisible, false);

}());
