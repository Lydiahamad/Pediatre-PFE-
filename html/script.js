"strict mode"
const calendar_month = document.querySelector("#calendar__month");
const calendar_year = document.querySelector('#calendar__year');
const calendar_day = document.querySelectorAll(".calendar__date");
const date= document.querySelector('#date');

let yearSelected = "";
let monthSelected = "";
let daySelected = "";

date.value="1996-01-01";
function displayDate( year ,  month, day){
    return date.value =  yearSelected+'-'+monthSelected +'-'+ daySelected;
}


calendar_year.addEventListener("change",function(){
    yearSelected = this.value;
    console.log(yearSelected);
    return displayDate(yearSelected,monthSelected,daySelected);
})

calendar_month.addEventListener("change", function(){
    monthSelected = this.value;
    return displayDate(yearSelected,monthSelected,daySelected);    
})



for(let day of calendar_day)
{
    day.addEventListener("click", function(){
        daySelected = this.textContent;
        return displayDate(yearSelected,monthSelected,daySelected);        
    })

}


