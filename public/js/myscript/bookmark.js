'use strict'
let bookmarkContainer = document.querySelector('.tweet-container');
let bookmarkMessage = document.querySelector('.bookmark-ntfcns');
function displayBookmarkAddClass () {
    bookmarkMessage.classList.toggle('bookmark-display');
        let bookmarkMessageDisplayTime = setTimeout(function () {
            bookmarkMessage.classList.toggle('bookmark-display');
        },5000); 
}

function displayBookmarkMessage(bookmarkStatus) {
    if (bookmarkStatus == 0) {
        bookmarkMessage.textContent = "This post has been added to your bookmarks sucessfully";
        displayBookmarkAddClass(); 
    } else {
        bookmarkMessage.textContent = "This post has is already in your bookmarks ";
         displayBookmarkAddClass();
        
    }
}

document.querySelector('.form-others').addEventListener('submit',function (e) {
    e.preventDefault();
    console.log('content has loaded');

});
bookmarkContainer.addEventListener('click',function (e) {
   
    
    if (e.target.type  && e.target.className == 'bookmark-sbt-btn'  ) {
        e.preventDefault();
        //console.log(e.target);
        let inputValue = e.target.parentElement.previousElementSibling.value;
        //console.log(inputValue);
        var xhr = new XMLHttpRequest(); // Create XMLHttpRequest object
xhr.onload = function() { // When response has loaded
if(xhr.status === 200) { // If server status was ok
    let response =JSON.parse(xhr.responseText);
//console.log(JSON.parse(xhr.responseText));
console.log( response.bookmarked);
displayBookmarkMessage(response.bookmarked);


}
} ;
xhr.open('POST', '/bookmark',true);
xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
xhr.setRequestHeader('X-CSRF-TOKEN',metaToken);
xhr.send(`Post_id=${inputValue}&_token=${token}`);
    } else {
        
    }
})


/* show all bookmarks for a particular user */

//let bookmarknav =