
/* My Scripts */
// (function($){
$(document).ready(function () {
 
    //Remove url hash on reload
    function removeHash () { 
        history.pushState("", document.title, window.location.pathname + window.location.search);
    }
    //removeHash();

   

    //Mobile Portfolio Menu
    $('.mobile-menu-btn').click(function(){
      $('.mobile-nav').animate({marginLeft: '0vw'});
    });
  
    $('.mobile-close-btn, .mobile-nav div div ul a').click(function(){
      $('.mobile-nav').animate({marginLeft: '-100vw'});
    });
  
    //Sticky portfolio Nav
    $("#PortfolioSidebar .sticky").sticky({ topSpacing: 0});
  
    
   
    
  
    //Chart.js animate in view
    var inView = false;
  
    function isScrolledIntoView(elem) {
      var docViewTop = $(window).scrollTop();
      var docViewBottom = docViewTop + $(window).height();
  
      var elemTop = $(elem).offset().top;
      var elemBottom = elemTop + $(elem).height();
  
      return ((elemTop <= docViewBottom) && (elemBottom >= docViewTop));
    }
    //Draw charts
    $(window).on('scroll', function() {
      if (isScrolledIntoView('#skill5')) {
        $(window).off('scroll');
        if (inView) { return; }
        inView = true;
    
        Chart.pluginService.register({
          beforeDraw: function (chart) {
            if (chart.config.options.elements.center) {
              //Get ctx from string
              var ctx = chart.chart.ctx;
        
              //Get options from the center object in options
              var centerConfig = chart.config.options.elements.center;
              var fontStyle = centerConfig.fontStyle || 'Arial';
              var txt = centerConfig.text;
              var color = centerConfig.color || '#000';
              var sidePadding = centerConfig.sidePadding || 20;
              var sidePaddingCalculated = (sidePadding / 100) * (chart.innerRadius * 2)
              //Start with a base font of 30px
              ctx.font = "30px " + fontStyle;
        
              //Get the width of the string and also the width of the element minus 10 to give it 5px side padding
              var stringWidth = ctx.measureText(txt).width;
              var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;
        
              // Find out how much the font can grow in width.
              var widthRatio = elementWidth / stringWidth;
              var newFontSize = Math.floor(30 * widthRatio);
              var elementHeight = (chart.innerRadius * 2);
        
              // Pick a new font size so it will not be larger than the height of label.
              var fontSizeToUse = Math.min(newFontSize, elementHeight);
        
              //Set font settings to draw it correctly.
              ctx.textAlign = 'center';
              ctx.textBaseline = 'middle';
              var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
              var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
              ctx.font = fontSizeToUse + "px " + fontStyle;
              ctx.fillStyle = color;
        
              //Draw text in center
              ctx.fillText(txt, centerX, centerY);
            }
          }
        });
    //Industry Knowledge
        var skill1 = $("#skill1");
        var myChart = new Chart(skill1, {
          type: 'doughnut',
          display: true,
          text: 'HTML5/CSS',
          data: {
            datasets: [{
              data: [90, 10],
              backgroundColor: [
                '#4A3C52',
                '#EDEEEE'
              ]
            }]
          },
    
          options: {
            title: {
              display: true,
              text: 'Graphic Design',
              position: 'bottom',
              fontSize: 18,
              fontFamily: 'SpaceText-Medium'
            },
            
            tooltips: {
              enabled: false
            },
            hover: {
              mode: null
            },
            elements: {
              center: {
                text: '90%',
                color: '#4A3C52', //Default black
                fontStyle: 'SpaceText-Medium', //Default Arial
                sidePadding: 20 //Default 20 (as a percentage)
              }
            }
          }
        });
        var skill2 = document.getElementById("skill2");
        var myChart = new Chart(skill2, {
          type: 'doughnut',
          data: {
            datasets: [{
              data: [80, 10],
              backgroundColor: [
                '#4A3C52',
                '#EDEEEE'
              ]
            }]
          },
          options: {
            tooltips: {
              enabled: false
            },
            hover: {
              mode: null
            },
            title: {
              display: true,
              text: 'Web Development',
              position: 'bottom',
              fontSize: 18,
              fontFamily: 'SpaceText-Medium'
            },
            elements: {
              center: {
                text: '80%',
                color: '#4A3C52', //Default black
                fontStyle: 'SpaceText-Medium', //Default Arial
                sidePadding: 20 //Default 20 (as a percentage)
              }
            }
          }
        });
    
        var skill3 = document.getElementById("skill3");
        var myChart = new Chart(skill3, {
          type: 'doughnut',
          data: {
            datasets: [{
              data: [70, 30],
              cutoutPercentage: 100,
              backgroundColor: [
                '#4A3C52',
                '#EDEEEE'
              ]
            }]
          },
          options: {
            tooltips: {
              enabled: false
            },
            hover: {
              mode: null
            },
            title: {
              display: true,
              text: 'Digital Marketing',
              position: 'bottom',
              fontSize: 18,
              fontFamily: 'SpaceText-Medium'
            },
            elements: {
              center: {
                text: '70%',
                color: '#4A3C52', //Default black
                fontStyle: 'SpaceText-Medium', //Default Arial
                sidePadding: 20 //Default 20 (as a percentage)
              }
            }
          }
        });
        var skill4 = document.getElementById("skill4");
        var myChart = new Chart(skill4, {
          type: 'doughnut',
          data: {
            datasets: [{
              data: [75, 25],
              cutoutPercentage: 100,
              backgroundColor: [
                '#4A3C52',
                '#EDEEEE'
              ]
            }]
          },
          options: {
            tooltips: {
              enabled: false
            },
            hover: {
              mode: null
            },
            title: {
              display: true,
              text: 'Web Services',
              position: 'bottom',
              fontSize: 18,
              fontFamily: 'SpaceText-Medium'
            },
            elements: {
              center: {
                text: '75%',
                color: '#4A3C52',
                fontStyle: 'SpaceText-Medium',
                sidePadding: 20
              }
            }
          }
        });
    
        //bottom charts
        var skill5 = document.getElementById("skill5");
        var myChart = new Chart(skill5, {
          type: 'horizontalBar',
          data: {
            labels: ["Photoshop", "Illustrator", "HTML/CSS", "Javascript"],
            datasets: [
              {
                label: "",
                backgroundColor: ["#4A3C52", "#4A3C52","#4A3C52","#4A3C52"],
                data: [5400,5150,4850,5250,4500, 3800]
              }
            ]
          },
          options: {
            tooltips: {
              enabled: false
            },
            hover: {
              mode: null
            },
            legend: { 
              display: false,
              labels: {
                // This more specific font property overrides the global property
                fontColor: '#4A3C52'
            } 
            },
            title: {
              display: false,
              text: ''
            },
            maintainAspectRatio: false,
            scales: {
              yAxes: [{
                  barPercentage: .7,
                  gridLines: {
                    display:false,
                    drawBorder: false,
                },
                ticks: {
                  fontSize: 18,
                  fontFamily: 'SpaceText-Medium'
              }
                
              }],
              xAxes: [{
               
                gridLines: {
                    display:false,
                    drawBorder: false,
                },
                ticks: {
                  display: false
              }
            }]
          }
    
            
          }
      });
        
      } else {
        inView = false;
      }
    });
  
    //Particle.js
    function loadParticles() {
      var options = {
        "particles":{"number":{"value":6,"density":{"enable":true,"value_area":800}},"color":{"value":"#342038"},"shape":{"type":"edge","stroke":{"width":0,"color":"#000"},"polygon":{"nb_sides":6},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":1,"random":true,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":15,"random":true,"anim":{"enable":true,"speed":10,"size_min":40,"sync":false}},"line_linked":{"enable":false,"distance":200,"color":"#ffffff","opacity":1,"width":2},"move":{"enable":true,"speed":2,"direction":"top","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":false,"mode":"grab"},"onclick":{"enable":false,"mode":"push"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true};
        particlesJS("particles-js", options);
      }
      loadParticles();
  
  });//END Scripts
// }(jQuery));
  

  
  
  
  
  
  
  
  
  
  











