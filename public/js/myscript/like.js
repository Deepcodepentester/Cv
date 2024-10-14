'use strict'
let like = document.querySelector('#like');
let token = like.parentElement.parentElement.firstElementChild.value;
let metaToken = document.querySelector('#meta-token').content;
let tweetContainer = document.querySelector('.tweet-container');
console.log(token);
console.log(document.querySelector('#meta-token').content);

/* document.querySelector('form').addEventListener('submit',function (e) {
    e.preventDefault();
    console.log('content has loaded');

}) */
tweetContainer.addEventListener('click',function (e) {
    
    //console.log(e.target);
    if (e.target.type  && e.target.id == 'like'  ) {
        e.preventDefault();
        //console.log('a button element');
        //console.log(e.target.id);
        //console.log(e.target.parentElement.previousElementSibling);
        let inputValue = e.target.parentElement.previousElementSibling.value;
        //console.log(inputValue);


        var xhr = new XMLHttpRequest(); // Create XMLHttpRequest object
xhr.onload = function() { // When response has loaded
if(xhr.status === 200) { // If server status was ok
//document .getElementByid('content').innerHTML = xhr.responseText ; //Update
//console.log(xhr.responseText);
let pt = JSON.parse(xhr.responseText).liked;
console.log(JSON.parse(xhr.responseText));
console.log(pt);

}
} ;
//xhr.open('GET', '/like?db=twitter&table=likes&target=sql.php',true);
xhr.open('POST', '/like',true);
xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
//xhr.setRequestHeader('X-CSRF-TOKEN',metaToken);


//xhr.send(`Post_id=${inputValue}&_token=${token}`);
//xhr.send('db=1');
xhr.send(`Post_id=${inputValue}&_token=${token}&db=1`);
    } else {
        
    }
})
/* like.addEventListener('click',function (e) {
    e.preventDefault();
    console.log(e.target);
    return;
       var xhr = new XMLHttpRequest(); // Create XMLHttpRequest object
xhr.onload = function() { // When response has loaded
if(xhr.status === 200) { // If server status was ok
//document .getElementByid('content').innerHTML = xhr.responseText ; //Update
//console.log(xhr.responseText);
console.log(JSON.parse(xhr.responseText));

}
} ;
xhr.open('POST', '/like',true);
xhr.setRequestHeader('content-type','x-www-form-urlencoded');
xhr.setRequestHeader('X-CSRF-TOKEN',metaToken);

xhr.send(`Post_id=1&_token=${token}`);

}) */

/* var xhr = new XMLHttpRequest(); // Create XMLHttpRequest object
xhr.onload = function() { // When response has loaded
if(xhr.status === 200) { // If server status was ok
//document .getElementByid('content').innerHTML = xhr.responseText ; //Update
console.log('content has loaded')
}
} ;
xhr.open('POST', '/like',true);
xhr.setRequestHeader('content-type','x-www-form-urlencoded');

xhr.send("Post_id=1"); */






/* 
'use strict'
let view = document.querySelector('#view');
function request() {
   
     
     let request = new XMLHttpRequest();
     request.open('POST','view.php');
     request.setRequestHeader("Content-TYPE","application/x-www-form-urlencoded"); 
     request.onreadystatechange = function () {
       if (this.readyState === 4 && this.status === 200) {
         document.querySelector('.text').innerHTML = request.responseText;
           //let response = userToken = JSON.parse(request.responseText);
           console.log(request.responseText);
 console.log('12345456666');

          
         
         
         
       } 
     
      
       
     }
     request.send(`init=1&email=${document.querySelector('#email').value}`);
     
 }



 view.addEventListener('click', request);



 console.log('12345456666');
 //request(); */
 //setInterval(test,2000);
 setTimeout(test,4000);
 function test() {
    var xhr = new XMLHttpRequest(); // Create XMLHttpRequest object
    xhr.onload = function() { // When response has loaded
    if(xhr.status === 200) { // If server status was ok
    console.log(JSON.parse(xhr.responseText));
    let res = xhr.responseText;
    console.log(xhr.responseText);
    
    }
    } ;
    //xhr.open('GET', '/like?db=twitter&table=likes&target=sql.php',true);
    xhr.open('POST', '/polllike',true);
    xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
    xhr.send(`_token=${token}&db=1`);
     console.log("polling");
     
 }