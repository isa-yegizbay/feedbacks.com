function hey(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("resp").innerHTML =
                this.responseText;
        }
    };
    var first_name = document.getElementById("fname").value;
    console.log(first_name);
    xhttp.open("GET", "/feedbacks/ajax?first_name="+first_name, true);
    xhttp.send();

}

if(document.readyState  !== 'loading'){

} else {
    //document.addEventListener('DOMContentLoaded', hey)
}