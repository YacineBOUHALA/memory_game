var c = new Date();
var timeIn = c.getSeconds();


let finded = JSON.parse(localStorage.getItem("state"));
let picture;

if(finded && finded.length){
    picture = finded.map(p=>p.picture);

}else{
    let random = (array)=> array.map(p => [p, Math.random()]).sort((a, b) => a[1] - b[1]).map(p => p[0])

    var lengthRange = 16;
    var win = 16;
    var photo = random([...Array(lengthRange).keys()])
        .slice(0, win);

    picture = random([...photo, ...photo]);

    finded = [...picture].map(p=>{return{
        picture:p,
        find:false
    }});
}




var pics = document.getElementsByTagName("img");
picture.forEach((pic, index)=>{
        pics[index].src2 = `a${pic}.jpg`;
        pics[index].index = index;
        if(finded[index].find){
         pics[index].src = `a${pic}.jpg`;
        }
    });


var count = 0;
var points = document.getElementById('score');
var score;
var pas = 1;
var p1, p2;

window.onbeforeunload = confirmExit;
  function confirmExit()
  {
    return "You have attempted to leave this page.  If you have made any changes to the fields without clicking the Save button, your changes will be lost.  Are you sure you want to exit this page?";
  }


alert("si vous avez déja jouer et que votre score est supérieure a 0 vorte il va s'afficher automatiquement aprés le premier click sur l'une des images ");
document.addEventListener('click', function (e) {
    var xd = $(e.target);
    if ($(xd).attr('src') === "voi.gif") {
        switch (pas) {
            case 1:
                if (e.target.tagName == 'IMG' ) {
                        e.target.src = e.target.src2;
                        p1 = e.target;
                        pas = 2;
                }
                break;
            case 2:
                if (e.target.tagName == 'IMG') {
                    e.target.src = e.target.src2;
                    p2 = e.target;
                    pas = 3;

                }
                timer = setTimeout(verifier,1700);
                break;
            case 3:
                clearTimeout(timer);
                verifier();
                break;
        }
    }
    
});


function verifier(){
    if ((p1.src2 == p2.src2)&& (p1 != p2)) {
                p1.replaceWith(p1);
                p2.replaceWith(p2);
                finded[p1.index].find = finded[p2.index].find = true;
                localStorage.setItem("state",JSON.stringify(finded) ); 
                debugger;
                count++;
         if (finded.every(p=>p.find)){
               alert(score);
            localStorage.setItem("final",score+'' );
                         localStorage.setItem("state",JSON.stringify([]) ); 

       var c = new Date();
       var timeOut = c.getSeconds();
        tempJeu = timeOut - timeIn ;
        
        alert('vous avez gagné:\n votre temps est de'+ tempJeu + 'seconde\n votre nouveau score est: ' + score);
        return;
    }
    
        
        score += 10; 
        if(p1.src2 === "a0.jpg"){
                document.body.style.backgroundRepeat = "no-repeat";
                document.body.style.backgroundSize = "cover";
               document.body.style.backgroundImage = "url('a0.jpg')";
        }
         if(p1.src2 === "a1.jpg"){
                document.body.style.backgroundRepeat = "no-repeat";
                document.body.style.backgroundSize = "cover";
                 document.body.style.backgroundImage = "url('a1.jpg')";
        }
         if(p1.src2 === "a2.jpg"){
         
            
                 document.body.style.backgroundRepeat = "no-repeat";
                 document.body.style.backgroundSize = "cover";
                 document.body.style.backgroundImage = "url('a2.jpg')";
            
        }
         if(p1.src2 === "a3.jpg"){
            
                document.body.style.backgroundRepeat = "no-repeat";
                document.body.style.backgroundSize = "cover";
                 document.body.style.backgroundImage = "url('a3.jpg')";
        }
         if(p1.src2 === "a4.jpg"){        
                 document.body.style.backgroundRepeat = "no-repeat";
                 document.body.style.backgroundSize = "cover";
                 document.body.style.backgroundImage = "url('a4.jpg')";
        }
         if(p1.src2 === "a5.jpg"){
                document.body.style.backgroundRepeat = "no-repeat";
                document.body.style.backgroundSize = "cover";
                 document.body.style.backgroundImage = "url('a5.jpg')";
        }
         
        
        if(p1.src2 === "a6.jpg"){
                document.body.style.backgroundRepeat = "no-repeat";
                document.body.style.backgroundSize = "cover";
                 document.body.style.backgroundImage = "url('a6.jpg')";
        }
        
        
        if(p1.src2 === "a7.jpg"){
                document.body.style.backgroundRepeat = "no-repeat";
                document.body.style.backgroundSize = "cover";
                 document.body.style.backgroundImage = "url('a7.jpg')";
        }
        
        
        if(p1.src2 === "a8.jpg"){
                document.body.style.backgroundRepeat = "no-repeat";
                document.body.style.backgroundSize = "cover";
                 document.body.style.backgroundImage = "url('a8.jpg')";
        }
        
        
        if(p1.src2 === "a9.jpg"){
                 document.body.style.backgroundRepeat = "no-repeat";
                document.body.style.backgroundSize = "cover";
                 document.body.style.backgroundImage = "url('a9.jpg')";
        }
         
    
        if(p1.src2 === "a10.jpg"){
                document.body.style.backgroundRepeat = "no-repeat";
                document.body.style.backgroundSize = "cover";
                 document.body.style.backgroundImage = "url('a10.jpg')";    
        }
    
        
        if(p1.src2 === "a11.jpg"){
                document.body.style.backgroundRepeat = "no-repeat";
                document.body.style.backgroundSize = "cover";
                 document.body.style.backgroundImage = "url('a11.jpg')";
        }
        
        if(p1.src2 === "a12.jpg"){
                document.body.style.backgroundRepeat = "no-repeat";
                document.body.style.backgroundSize = "cover";
                 document.body.style.backgroundImage = "url('a12.jpg')";
        }
        
        
        if(p1.src2 === "a13.jpg"){
                document.body.style.backgroundRepeat = "no-repeat";
                document.body.style.backgroundSize = "cover";
                 document.body.style.backgroundImage = "url('a13.jpg')";
        }
        
        if(p1.src2 === "a14.jpg"){
                document.body.style.backgroundRepeat = "no-repeat";
                document.body.style.backgroundSize = "cover";
                 document.body.style.backgroundImage = "url('a14.jpg')";
        }
        
        
        if(p1.src2 === "a15.jpg"){
                document.body.style.backgroundRepeat = "no-repeat";
                document.body.style.backgroundSize = "cover";
                 document.body.style.backgroundImage = "url('a15.jpg')";
        }
        
        
        if(p1.src2 === "a16.jpg"){
                document.body.style.backgroundRepeat = "no-repeat";
                document.body.style.backgroundSize = "cover";
                 document.body.style.backgroundImage = "url('a16.jpg')";
        } 
        
        
        
    } else {
                p2.src = p1.src = 'voi.gif'
                if(score > 0){
                score -= 5;
                }
            }
            pas = 1;
    points.textContent = score;
    
    //fin de jeux
 
}
 var x = document.cookie; 
    console.log(x);


function set(){
if(location.reload)
            {
    var a= getapis();
        console.log(a);
            }
            

} 

var d;
function getapis(){

 var url = 'file:///C:/Users/i5/Desktop/tpL2Informatique/LW/projet/memory_game/card.html';
 loadJSON(url, gotData,'jsonp');
}


 