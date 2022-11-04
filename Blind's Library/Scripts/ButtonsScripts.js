let searchedText = 'sad'
function visitPage(stringLink){
    window.location= stringLink;    
}

function searchBox(){
    let searchedText = document.getElementById("SrchBoxFn").value;
    if (searchedText != '')
        visitPage('SearchResults.html')
        SearchLabel(searchedText);
}

function SearchLabel(searchedTxt){
    document.getElementById('BookSearched').textContent = searchedText;
    document.getElementById('BookSearched').innerText = searchedText;

}