!function(o){"use strict";var t=function(){};t.prototype.initPopoverPlugin=function(){o.fn.popover&&o('[data-toggle="popover"]').popover()},t.prototype.initSlimScrollPlugin=function(){o.fn.slimScroll&&o(".slimscroll-alt").slimScroll({position:"right",size:"5px",color:"#98a6ad",wheelStep:10})},t.prototype.initRangeSlider=function(){o.fn.slider&&o('[data-plugin="range-slider"]').slider({})},t.prototype.initCounterUp=function(){o(this).attr("data-delay")&&o(this).attr("data-delay"),o(this).attr("data-time")&&o(this).attr("data-time"),o('[data-plugin="counterup"]').each(function(t,i){o(this).counterUp({delay:100,time:1200})})},t.prototype.initToast=function(){o.fn.toast&&o('[data-toggle="toast"]').toast()},t.prototype.initAccordionBg=function(){o(".collapse.show").each(function(){o(this).prev(".card-header").addClass("custom-accordion")}),o(".collapse").on("show.bs.collapse",function(){o(this).prev(".card-header").addClass("custom-accordion")}).on("hide.bs.collapse",function(){o(this).prev(".card-header").removeClass("custom-accordion")})},t.prototype.initValidation=function(){window.addEventListener("load",function(){var t=document.getElementsByClassName("needs-validation");Array.prototype.filter.call(t,function(i){i.addEventListener("submit",function(t){!1===i.checkValidity()&&(t.preventDefault(),t.stopPropagation()),i.classList.add("was-validated")},!1)})},!1)},t.prototype.init=function(){this.initPopoverPlugin(),this.initSlimScrollPlugin(),this.initRangeSlider(),this.initCounterUp(),this.initToast(),this.initAccordionBg(),this.initValidation()},o.Components=new t,o.Components.Constructor=t}(window.jQuery),function(t){"use strict";window.jQuery.Components.init()}();