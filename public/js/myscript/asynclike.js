'use strict'
let like = document.querySelector('#like');
//let token = like.parentElement.parentElement.firstElementChild.value;
let metaToken = document.querySelector('#meta-token').content;
let tweetContainer = document.querySelector('.tweet-container');
let token = metaToken;
console.log(token);
console.log(document.querySelector('#meta-token').content);

/* document.querySelector('form').addEventListener('submit',function (e) {
    e.preventDefault();
    console.log('content has loaded');

}) */
tweetContainer.addEventListener('click',function (e) {
    let inputValue = e.target.parentElement.previousElementSibling.value;
    
    //console.log(e.target);
    //postid-{{$owners->id}}-likebtn
    if (e.target.type  && e.target.id == 'postid-'+inputValue+'-likebtn'  ) {
        e.preventDefault();
        //console.log('a button element');
        //console.log(e.target.id);
        //console.log(e.target.parentElement.previousElementSibling);
        let inputValue = e.target.parentElement.previousElementSibling.value;
        //console.log(inputValue);
        
        
        console.log(inputValue);
        


        var xhr = new XMLHttpRequest(); // Create XMLHttpRequest object
xhr.onload = function() { // When response has loaded
if(xhr.status === 200) { // If server status was ok
//document .getElementByid('content').innerHTML = xhr.responseText ; //Update
console.log(JSON.parse(xhr.responseText));
let data = JSON.parse(xhr.responseText);
document.getElementById("postid-"+inputValue+"-likes").textContent= "Likes  "+data.likecount;
if (data.liked==0) {
    document.getElementById("postid-"+inputValue+"-likebtn").style.backgroundColor="red"
    //document.getElementById("postid-"+"16"+"-likes").style.backgroundColor="red"
console.log('yes');

}

console.log(JSON.parse(xhr.responseText));


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

