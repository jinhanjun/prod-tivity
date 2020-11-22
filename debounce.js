
const KEY = 'debounce-terms';

let init = function(){
    document.getElementById('majorinput').addEventListener('input', efficientSearch);
    
    let terms = ['Business and Management', 'Nursing', 'Psychology', 'Biology', 'Engineering', 'Education', 'Communications', 'Finance and Accounting', 'Criminal Justice', 'Anthropology and Sociology', 'Computer Science', 'English', 'Economics', 'Political Science', 'History', 'Kinesiology and Physical Therapy', 'Health Professions', 'Art', 'Math', 'Environmental Science', 'Foreign Languages', 'Statistics', 'Design', 'Chemistry', 'International Relations', 'Agricultural Sciences', 'Religious Studies', 'Physics', 'Philosophy', 'Pharmacy']; 
    localStorage.setItem(KEY, JSON.stringify(terms));
}

let getList = function(txt){
    return new Promise((resolve, reject)=>{
        setTimeout((function(){
            let startingchar = '^' + this.toString();
            let pattern = new RegExp(startingchar, 'i'); 
            let terms = JSON.parse(localStorage.getItem(KEY));
            let matches = terms.filter(term => pattern.test(term));
            console.log('matches', matches);
            resolve(matches);
        }).bind(txt), 300);
    })
}

let debounce = function(func, wait, immediate) {
    var timeout;
    return function() {
        var context = this, args = arguments;
        var later = function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
};

let efficientSearch = debounce(function(event){
    let text = event.target.value;
    let suggestionpanel = document.getElementById('suggestions');

    getList(text)
    .then((list)=>{
            suggestionpanel.innerHTML = '';
            list.forEach(item=>{
                
                let div = document.createElement('div');
                div.innerHTML = item;
                div.className += 'signupbox form-control form-control-lg form-rounded';
                div.addEventListener("click", function(e) {
                    document.getElementById("majorinput").value = item;
                    document.getElementById("suggestions").innerHTML = "";
                });
                suggestionpanel.appendChild(div);
            })
        
    })
    .catch(err=>console.warn(err));
}, 300);
document.addEventListener('DOMContentLoaded', init);
