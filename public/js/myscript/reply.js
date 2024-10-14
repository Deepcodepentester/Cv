let metaToken = document.querySelector('#meta-token').content;
let tweetContainer = document.querySelector('.tweet-container');
let moreReplyBtn = document.getElementById('show-more-replies');
let moreReplyBtnSibling =document.getElementById('show-more-replies').nextElementSibling.value
let token = metaToken;
let replyBtn = document.querySelectorAll('.reply-btn');
/* document.getElementById('replypostid16').value */
let replyOffset = 0
console.log(replyBtn)

moreReplyBtn.addEventListener('click',moreReplies)
function moreReplies() {
    replyOffset+=1;
    var xhr = new XMLHttpRequest(); // Create XMLHttpRequest object
    xhr.onload = function() { // When response has loaded
    if(xhr.status === 200) { // If server status was ok
    console.log(JSON.parse(xhr.responseText).replies.length);
    replies = JSON.parse(xhr.responseText);
    for (let index = 0; index < replies.replies.length; index++) {
        //const element = array[index];
        let reply = document.createElement("div");
        let replyHeader = document.createElement("div");
        replyHeader.setAttribute("class","tweet-header");
        let replyContentContainer = document.createElement("div");
        replyContentContainer.setAttribute("class","each-reply-content");
        let para = document.createElement("p");
        para.textContent = replies.replies[index][2];
        replyContentContainer.appendChild(para);
        let profilepic = document.createElement("div");
        profilepic.setAttribute("class","profile-pic");
        
        let img = document.createElement("img");
        img.setAttribute("src","http://localhost:8000/storage/tweetmedia/fjNWdivsubv0EWx1ONYe0RUiM5gf1KJIg74z2QI6.jpg");
        img.setAttribute("width","25px");
        img.setAttribute("height","25px");
        profilepic.appendChild(img)
        replyHeader.appendChild(profilepic)
        let container = document.createElement("div");
    container.setAttribute("class","each-reply-container");
    container.appendChild(replyHeader);
    container.appendChild(replyContentContainer);
    
    //<div class="each-reply-container"></div>
    {/* <div>
                        <h2> {{$replyowner->name}} </h2>
                        <p> {{$replyowner->email}} </p>
                        
                    </div>
                    <!--  -->
                    <p> {{$reply->created_at}} </p> */}
                    
    
    
    //let child = document.getElementById("postid-16-reply-btn-parent").cloneNode(true);
 
    let m  = document.querySelector(".main-reply-container");
    m.appendChild(container);
        
    }//for
    
    }
    } ;
    
    xhr.open('POST', '/morereply',true);
    xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
    xhr.send(`post_id=${moreReplyBtnSibling}&_token=${token}&offset=${replyOffset}`);
}


for (let index = 0; index < replyBtn.length; index++) {
    const element = replyBtn[index].addEventListener('click',getcontainer);
    console.log(replyBtn[index].parentElement.firstElementChild.value)
    
    
}


 function testing(e) {
    e.preventDefault();
     console.log(e.target.parentNode.parentNode.parentNode.previousElementSibling);
     //e.target.parentNode.parentNode.parentNode.insertAdjacentHTML('afterend',"<input type='text'><button>send reply<button>")
    let = document.createElement('input');
    e.target.parentNode.parentNode.parentNode.previousElementSibling.firstElementChild.setAttribute('style','display:block')
    console.log(e.target.parentElement.firstElementChild.value)
    let token = e.target.parentElement.firstElementChild.value
    let el = e.target.parentElement.firstElementChild.nextElementSibling;
    let userid = e.target.parentElement.firstElementChild.nextElementSibling.value;
    let postid = el.nextElementSibling.value;
    console.log(postid)
    //http(token,userid,postid,reply)
 }

 function http(token,userid,postid) {
    var xhr = new XMLHttpRequest(); // Create XMLHttpRequest object
    xhr.onload = function() { // When response has loaded
    if(xhr.status === 200) { // If server status was ok
    //document .getElementByid('content').innerHTML = xhr.responseText ; //Update
    //console.log(xhr.responseText);
    console.log(JSON.parse(xhr.responseText));
    
    }
    } ;
    //xhr.open('GET', '/like?db=twitter&table=likes&target=sql.php',true);
    xhr.open('POST', '/morereply',true);
    xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
    //xhr.setRequestHeader('X-CSRF-TOKEN',metaToken);
    
    
    xhr.send(`post_id=${postid}&user_id=${userid}&reply=${reply}&_token=${token}&db=1`);
    //xhr.send(`Post_id=${inputValue}&_token=${token}&db=1`);
        
    
 }

 function getcontainer(e) {
    e.preventDefault();
    let reply = document.createElement("div");
    let para = document.createElement("p");
    let container = document.createElement("div");
    //para.textContent = reply
    container
    //<div class="each-reply-container"></div>
    {/* <div>
                        <h2> {{$replyowner->name}} </h2>
                        <p> {{$replyowner->email}} </p>
                        
                    </div>
                    <!--  -->
                    <p> {{$reply->created_at}} </p> */}
                    
    container.setAttribute("class","each-reply-container");
    //con.setAttribute("class","modal-content");
    //let child = document.getElementById("postid-16-reply-btn-parent").cloneNode(true);
    //let c = child;
    //let n = document.getElementsByClassName("tweet-container");
    let m  = document.getElementsByTagName("body");
    //reply.appendChild(child);
    //reply.appendChild(con);
    //m[0].appendChild(reply);
    m[0].appendChild(container);
 }
 