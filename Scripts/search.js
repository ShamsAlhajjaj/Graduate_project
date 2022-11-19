const searchwrapper=document.querySelector(".search-input");
const inputbox=document.querySelector("input");
const suggbox=document.querySelector(".autocom-box");
const icon=document.querySelector(".icon");
let linktag=searchwrapper.querySelector("a");
let weblink;

inputbox.onkeyup=(e)=>{
	let userdata=e.target.value;
	let emptyarray=[];
	if(userdata){
		icon.onclick=()=>{
			weblink="http:www.google.com/search?"+userdata;
		linktag.log(weblink);
		linktag.click();	
		}
	emptyarray=suggestion.filter((data)=>)
		data.tolocalowerCase().startWith(userdata.tolocalowerCase(());


	}
}

emptyarray=emptyarray.mab((data)=>{

});
searchwrapper.classlist.add("active");
showSuggestions(emptyarray);
let alllist=suggbox.querySelector("li");
for (let i =0; i< alllist.length; i++) {


}else{
	searchwrapper.classlist.remove("active");..
}
function select(elements){
	let selectdata=elements.textContent;
	inputbox.value=selectdata;
	icon.onclick=()=>{
		weblink="http"
		linktag.setAttribute("herf",weblink);
		linktag.click();
	}
searchwrapper.classlist.remove("active");





}

function showSuggestion(list){
	let listData;
	if(!list.length){
		userValue=inputbox.vaue;
		listData='<li>'+userValue+'<li>';

	}else{
		listData=list.join()
	}
}   suggbox.innerHTML=listData;