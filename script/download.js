document.addEventListener("DOMContentLoaded", ()=> {
    !function(a){"use strict";function b(a,b){return b=b||{},
    Promise.resolve(a).then(function(a){return e(a,b.filter)}).then(f).then(g).then(function(a){return b.bgcolor&&(a.style.backgroundColor=b.bgcolor),
    a}).then(function(b){return h(b,a.scrollWidth,a.scrollHeight)})}
    function c(a,b){return i(a,b||{}).then(function(a){return a.toDataURL()})}
    function d(a,b){return i(a,b||{}).then(n.canvasToBlob)}
    function e(b,c){function d(a){return a instanceof HTMLCanvasElement?n.makeImage(a.toDataURL()):a.cloneNode(!1)}
    function f(a,b,c){function d(a,b,c){var d=Promise.resolve();
    return b.forEach(function(b){d=d.then(
    function(){return e(b,c)}).then(
    function(b){b&&a.appendChild(b)})}),d}var f=a.childNodes;
    return 0===f.length?Promise.resolve(b):d(b,n.asArray(f),c).then(
    function(){return b})}function g(b,c){function d(){
    function d(a,b){
    function c(a,b){n.asArray(a).forEach(function(c){b.setProperty(c,a.getPropertyValue(c),a.getPropertyPriority(c))})}a.cssText?b.cssText=a.cssText:c(a,b)}d(a.window.getComputedStyle(b),c.style)}
    function e(){function d(d){function e(b,c,d){function e(a){var b=a.getPropertyValue("content");return a.cssText+" content: "+b+";"}function f(a){function b(b){return b+": "+a.getPropertyValue(b)+(a.getPropertyPriority(b)?" !important":"")}return n.asArray(a).map(b).join("; ")+";"}var g="."+b+":"+c,h=d.cssText?e(d):f(d);return a.document.createTextNode(g+"{"+h+"}")}var f=a.window.getComputedStyle(b,d),g=f.getPropertyValue("content");if(""!==g&&"none"!==g){var h=n.uid();c.className=c.className+" "+h;var i=a.document.createElement("style");i.appendChild(e(h,d,f)),c.appendChild(i)}}[":before",":after"].forEach(function(a){d(a)})}function f(){b instanceof HTMLTextAreaElement&&(c.innerHTML=b.value)}function g(){c instanceof SVGElement&&c.setAttribute("xmlns","http://www.w3.org/2000/svg")}return c instanceof Element?Promise.resolve().then(d).then(e).then(f).then(g).then(function(){return c}):c}return c&&!c(b)?Promise.resolve():Promise.resolve(b).then(d).then(function(a){return f(b,a,c)}).then(function(a){return g(b,a)})}function f(a){return p.resolveAll().then(function(b){var c=document.createElement("style");return a.appendChild(c),c.appendChild(document.createTextNode(b)),a})}function g(a){return q.inlineAll(a).then(function(){return a})}function h(a,b,c){
    return Promise.resolve(a).then(function(a){
    return a.setAttribute("xmlns","http://www.w3.org/1999/xhtml"),(new XMLSerializer).serializeToString(a)}).then(
    n.escapeXhtml).then(function(a){
    return'<foreignObject x="0" y="0" width="100%" height="100%">'+a+"</foreignObject>"}).then(
    function(a){return'<svg xmlns="http://www.w3.org/2000/svg" width="'+b+'" height="'+c+'">'+a+"</svg>"}).then(
    function(a){return"data:image/svg+xml;charset=utf-8,"+a})}function i(a,c){
    function d(a){var b=document.createElement("canvas");
    return b.width=a.scrollWidth,b.height=a.scrollHeight,b}
    return b(a,c).then(n.makeImage).then(n.delay(100)).then(
    function(b){var c=d(a);
    return c.getContext("2d").drawImage(b,0,0),c})}
    function j(){function b(){
    var a="application/font-woff",b="image/jpeg";return{woff:a,woff2:a,ttf:"application/font-truetype",eot:"application/vnd.ms-fontobject",png:"image/png",jpg:b,jpeg:b,gif:"image/gif",tiff:"image/tiff",svg:"image/svg+xml"}}function c(a){var b=/\.([^\.\/]*?)$/g.exec(a);return b?b[1]:""}function d(a){var d=c(a).toLowerCase();return b()[d]||""}function e(a){return-1!==a.search(/^(data:)/)}function f(a){return new Promise(function(b){for(var c=window.atob(a.toDataURL().split(",")[1]),d=c.length,e=new Uint8Array(d),f=0;d>f;f++)e[f]=c.charCodeAt(f);b(new Blob([e],{type:"image/png"}))})}function g(a){return a.toBlob?new Promise(function(b){a.toBlob(b)}):f(a)}function h(b,c){var d=a.document.implementation.createHTMLDocument(),e=d.createElement("base");d.head.appendChild(e);var f=d.createElement("a");return d.body.appendChild(f),e.href=c,f.href=b,f.href}function i(){var a=0;return function(){function b(){return("0000"+(Math.random()*Math.pow(36,4)<<0).toString(36)).slice(-4)}return"u"+b()+a++}}function j(a){return new Promise(function(b,c){var d=new Image;d.onload=function(){b(d)},d.onerror=c,d.src=a})}function k(a){var b=3e4;return new Promise(function(c,d){function e(){if(4===g.readyState){if(200!==g.status)
    return void d(new Error("Cannot fetch resource "+a+", status: "+g.status));
    var b=new FileReader;b.onloadend=function(){
     var a=b.result.split(/,/)[1];c(a)},b.readAsDataURL(g.response)}}
    function f(){d(new Error("Timeout of "+b+"ms occured while fetching resource: "+a))}var g=new XMLHttpRequest;g.onreadystatechange=e,g.ontimeout=f,g.responseType="blob",g.timeout=b,g.open("GET",a,!0),g.send()})}function l(a,b){return"data:"+b+";base64,"+a}function m(a){return a.replace(/([.*+?^${}()|\[\]\/\\])/g,"\\$1")}function n(a){return function(b){return new Promise(function(c){setTimeout(function(){c(b)},a)})}}function o(a){for(var b=[],c=a.length,d=0;c>d;d++)b.push(a[d]);return b}function p(a){return a.replace(/#/g,"%23").replace(/\n/g,"%0A")}return{escape:m,parseExtension:c,mimeType:d,dataAsUrl:l,isDataUrl:e,canvasToBlob:g,resolveUrl:h,getAndEncode:k,uid:i(),delay:n,asArray:o,escapeXhtml:p,makeImage:j}}function k(){function a(a){return-1!==a.search(e)}function b(a){for(var b,c=[];null!==(b=e.exec(a));)c.push(b[1]);return c.filter(function(a){return!n.isDataUrl(a)})}function c(a,b,c,d){function e(a){return new RegExp("(url\\(['\"]?)("+n.escape(a)+")(['\"]?\\))","g")}return Promise.resolve(b).then(function(a){return c?n.resolveUrl(a,c):a}).then(d||n.getAndEncode).then(function(a){return n.dataAsUrl(a,n.mimeType(b))}).then(function(c){return a.replace(e(b),"$1"+c+"$3")})}function d(d,e,f){function g(){return!a(d)}return g()?Promise.resolve(d):Promise.resolve(d).then(b).then(function(a){var b=Promise.resolve(d);return a.forEach(function(a){b=b.then(function(b){return c(b,a,e,f)})}),b})}var e=/url\(['"]?([^'"]+?)['"]?\)/g;return{inlineAll:d,shouldProcess:a,impl:{readUrls:b,inline:c}}}function l(){function a(){return b(document).then(function(a){return Promise.all(a.map(function(a){return a.resolve()}))}).then(function(a){return a.join("\n")})}function b(){function a(a){return a.filter(function(a){return a.type===CSSRule.FONT_FACE_RULE}).filter(function(a){return o.shouldProcess(a.style.getPropertyValue("src"))})}function b(a){var b=[];return a.forEach(function(a){try{n.asArray(a.cssRules||[]).forEach(b.push.bind(b))}catch(c){console.log("Error while reading CSS rules from "+a.href,c.toString())}}),b}function c(a){
    return{resolve:function(){var b=(a.parentStyleSheet||{}).href;return o.inlineAll(a.cssText,b)},src:function(){
    return a.style.getPropertyValue("src")}}}return Promise.resolve(n.asArray(document.styleSheets)).then(b).then(a).then(
    function(a){return a.map(c)})}return{resolveAll:a,impl:{readAll:b}}}function m(){function a(a){function b(b){return n.isDataUrl(a.src)?Promise.resolve():Promise.resolve(a.src).then(b||n.getAndEncode).then(function(b){return n.dataAsUrl(b,n.mimeType(a.src))}).then(function(b){return new Promise(
    function(c,d){a.onload=c,a.onerror=d,a.src=b})})}return{inline:b}}function b(c){function d(a){var b=a.style.getPropertyValue("background");return b?o.inlineAll(b).then(
    function(b){a.style.setProperty("background",b,a.style.getPropertyPriority("background"))}).then(function(){return a}):Promise.resolve(a)}return c instanceof Element?d(c).then(function(){return c instanceof HTMLImageElement?a(c).inline():Promise.all(n.asArray(c.childNodes).map(function(a){
    return b(a)}))}):Promise.resolve(c)}return{inlineAll:b,impl:{newImage:a}}}var n=j(),o=k(),p=l(),q=m();a.domtoimage={toSvg:b,toPng:c,toBlob:d,impl:{fontFaces:p,images:q,util:n,inliner:o}}}(this);
    
        document.getElementById('download').addEventListener('click', function() {
    
    var node = document.getElementById('my-node');
    
    domtoimage.toPng(node)
      .then(function(dataUrl) {
      console.log(dataUrl);
        //window.open(dataUrl);
        var img = new Image();
        img.src = dataUrl;
        img.style.display = "none";
        document.getElementById("here-appear-theimages").appendChild(img);
       
        a = $("<a>").attr({href:dataUrl,download:'image.jpeg'}).html("");
        $("body").append(a);
        a.get(0).click();
      })
      .catch(function(error) {
        console.error('oops, something went wrong!', error);
      });
    
    });
})
