!function(a,b){"use strict";function c(a){return b.lowercase(a.nodeName||a[0]&&a[0].nodeName)}function d(a,c){var d=!1,e=!1;this.ngClickOverrideEnabled=function(f){return b.isDefined(f)?(f&&!e&&(e=!0,g.$$moduleName="ngTouch",c.directive("ngClick",g),a.decorator("ngClickDirective",["$delegate",function(a){if(d)a.shift();else for(var b=a.length-1;b>=0;){if("ngTouch"===a[b].$$moduleName){a.splice(b,1);break}b--}return a}])),d=f,this):d},this.$get=function(){return{ngClickOverrideEnabled:function(){return d}}}}function e(a,c,d){f.directive(a,["$parse","$swipe",function(e,f){var g=75,h=.3,i=30;return function(j,k,l){function m(a){if(!n)return!1;var b=Math.abs(a.y-n.y),d=(a.x-n.x)*c;return o&&g>b&&d>0&&d>i&&h>b/d}var n,o,p=e(l[a]),q=["touch"];b.isDefined(l.ngSwipeDisableMouse)||q.push("mouse"),f.bind(k,{start:function(a,b){n=a,o=!0},cancel:function(a){o=!1},end:function(a,b){m(a)&&j.$apply(function(){k.triggerHandler(d),p(j,{$event:b})})}},q)}}])}var f=b.module("ngTouch",[]);f.provider("$touch",d),d.$inject=["$provide","$compileProvider"],f.factory("$swipe",[function(){function a(a){var b=a.originalEvent||a,c=b.touches&&b.touches.length?b.touches:[b],d=b.changedTouches&&b.changedTouches[0]||c[0];return{x:d.clientX,y:d.clientY}}function c(a,c){var d=[];return b.forEach(a,function(a){var b=e[a][c];b&&d.push(b)}),d.join(" ")}var d=10,e={mouse:{start:"mousedown",move:"mousemove",end:"mouseup"},touch:{start:"touchstart",move:"touchmove",end:"touchend",cancel:"touchcancel"}};return{bind:function(b,e,f){var g,h,i,j,k=!1;f=f||["mouse","touch"],b.on(c(f,"start"),function(b){i=a(b),k=!0,g=0,h=0,j=i,e.start&&e.start(i,b)});var l=c(f,"cancel");l&&b.on(l,function(a){k=!1,e.cancel&&e.cancel(a)}),b.on(c(f,"move"),function(b){if(k&&i){var c=a(b);if(g+=Math.abs(c.x-j.x),h+=Math.abs(c.y-j.y),j=c,!(d>g&&d>h))return h>g?(k=!1,void(e.cancel&&e.cancel(b))):(b.preventDefault(),void(e.move&&e.move(c,b)))}}),b.on(c(f,"end"),function(b){k&&(k=!1,e.end&&e.end(a(b),b))})}}}]);var g=["$parse","$timeout","$rootElement",function(a,d,e){function f(a,b,c,d){return Math.abs(a-c)<q&&Math.abs(b-d)<q}function g(a,b,c){for(var d=0;d<a.length;d+=2)if(f(a[d],a[d+1],b,c))return a.splice(d,d+2),!0;return!1}function h(a){if(!(Date.now()-k>p)){var b=a.touches&&a.touches.length?a.touches:[a],d=b[0].clientX,e=b[0].clientY;1>d&&1>e||m&&m[0]===d&&m[1]===e||(m&&(m=null),"label"===c(a.target)&&(m=[d,e]),g(l,d,e)||(a.stopPropagation(),a.preventDefault(),a.target&&a.target.blur&&a.target.blur()))}}function i(a){var b=a.touches&&a.touches.length?a.touches:[a],c=b[0].clientX,e=b[0].clientY;l.push(c,e),d(function(){for(var a=0;a<l.length;a+=2)if(l[a]==c&&l[a+1]==e)return void l.splice(a,a+2)},p,!1)}function j(a,b){l||(e[0].addEventListener("click",h,!0),e[0].addEventListener("touchstart",i,!0),l=[]),k=Date.now(),g(l,a,b)}var k,l,m,n=750,o=12,p=2500,q=25,r="ng-click-active";return function(c,d,e){function f(){m=!1,d.removeClass(r)}var g,h,i,k,l=a(e.ngClick),m=!1;d.on("touchstart",function(a){m=!0,g=a.target?a.target:a.srcElement,3==g.nodeType&&(g=g.parentNode),d.addClass(r),h=Date.now();var b=a.originalEvent||a,c=b.touches&&b.touches.length?b.touches:[b],e=c[0];i=e.clientX,k=e.clientY}),d.on("touchcancel",function(a){f()}),d.on("touchend",function(a){var c=Date.now()-h,l=a.originalEvent||a,p=l.changedTouches&&l.changedTouches.length?l.changedTouches:l.touches&&l.touches.length?l.touches:[l],q=p[0],r=q.clientX,s=q.clientY,t=Math.sqrt(Math.pow(r-i,2)+Math.pow(s-k,2));m&&n>c&&o>t&&(j(r,s),g&&g.blur(),b.isDefined(e.disabled)&&e.disabled!==!1||d.triggerHandler("click",[a])),f()}),d.onclick=function(a){},d.on("click",function(a,b){c.$apply(function(){l(c,{$event:b||a})})}),d.on("mousedown",function(a){d.addClass(r)}),d.on("mousemove mouseup",function(a){d.removeClass(r)})}}];e("ngSwipeLeft",-1,"swipeleft"),e("ngSwipeRight",1,"swiperight")}(window,window.angular);