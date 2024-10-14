console.log('my first script');
let noOfInput = 0;

let uploadMedia = document.querySelector('#upload-media')


uploadMedia.addEventListener('click',function (e) {
    noOfInput ++;
    if (noOfInput <= 1) {
        let input = document.createElement('input');
        input.name = 'file';
        input.type = 'file'; 
        document.querySelector('.form-input').appendChild(input);
    }
    else return;
    
})