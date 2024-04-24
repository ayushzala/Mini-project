(function() {
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
    context.rect(0, 0, 300, 300);
    context.fill();
  
    //----------------------------------------------------------------------------
  
    var isDrag = false;
  
    function getAbsoluteCoordinates(canvas, event) {
      var canvasRect = canvas.getBoundingClientRect();
      return {
        x: event.clientX - canvasRect.left,
        y: event.clientY - canvasRect.top
      };
    }
  
    function clearArc(x, y) {
      if (isDrag) {
        context.globalCompositeOperation = 'destination-out';
        context.beginPath();
        context.arc(x, y, 22, 0, Math.PI * 2, false);
        context.fill();
      }
    }
  
    canvas.addEventListener('mousedown', function(event) {
      isDrag = true;
  
      var coordinates = getAbsoluteCoordinates(canvas, event);
  
      clearArc(coordinates.x, coordinates.y);
      judgeVisible();
    }, false);
  
    canvas.addEventListener('mousemove', function(event) {
      if (!isDrag) {
        return;
      }
  
      var coordinates = getAbsoluteCoordinates(canvas, event);
  
      clearArc(coordinates.x, coordinates.y);
      judgeVisible();
    }, false);
  
    canvas.addEventListener('mouseup', function(event) {
      isDrag = false;
    }, false);
  
    canvas.addEventListener('mouseleave', function(event) {
      isDrag = false;
    }, false);
  
    //----------------------------------------------------------------------------
    const showImageButton = document.querySelector('#submit');
    const imageContainer = document.querySelector('#image-container');
    const cancelButton = document.querySelector('#cancel-button');
  
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
  if( result[0] > 65000){
    showImageButton.disabled = false;
  }
    //   document.getElementById('gray-count').innerHTML = result[255];
    //   document.getElementById('erase-count').innerHTML = result[0];
    };
    // document.getElementById("submit")
    showImageButton.addEventListener('click', () => {
        imageContainer.style.display = 'block';});

      cancelButton.addEventListener('click', () => {
        alert("Hello Dear!! 🪙Coins🪙 Are Added successfully!!!");
      imageContainer.style.display = 'none';
    showImageButton.disabled = true;});

    document.addEventListener('DOMContentLoaded', judgeVisible, false);
  

  })();
  