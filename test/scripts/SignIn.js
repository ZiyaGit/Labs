//Written by Sebastian Deslauriers 
function validate() {
    let Uname = document.getElementById('username').value;
    let pass1 = document.getElementById('password').value;
    
    if (Uname.trim().length === 0 || Uname === null){ //make sure there is text in username input
        alert("A username must be filled out");
        return false;
    }
    else if(Uname.trim().length > 30){ //make sure username is less than 30 characters long
        alert('Username must be less than 30 characters long.');
        
        return false;
    }
    else if(Uname.trim().length < 8){
        alert('Username must be more than 7 characters long.');
        
        return false;
    }
    else{
    };        
    
    
}
