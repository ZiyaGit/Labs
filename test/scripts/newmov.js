//Written by Sebastian Deslauriers 
function validate() {
    let mname = document.getElementById('moviename').value;
    let year = document.getElementById('yearCreated').value;
    let len = document.getElementById('length').value;
    let gen = document.getElementById('genre').value;
    let rat = document.getElementById('rating').value;

    
    if (mname.trim().length === 0 || mname === null){ //make sure there is text in username input
        alert("A movie name must be given");
        return false;
    }
    else if(year.trim().length === 0 || year === null){ //make sure year is filled out
        alert('A year must be given');
        
        return false;
    }
    else if(year.trim().length < 4){
        alert('year must be 4 digits');
        
        return false;
    }
    else if(len.trim().length === 0 || len === null){ //make length is filled out
        alert('Enter the runtime of the movie in minutes');
        
        return false;
    }
    else if(gen === 'Genre:'){ //make sure genre is selected
        alert('Select Movie genre');
        
        return false;
    }
    else if(rat === 'Rating:'){ //make sure rating is selected
        alert('Select Movie rating');
        
        return false;
    }
    else{
    };        
    
    
}
