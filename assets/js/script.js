$(document).ready(function (e){

    $(".tile-bloco").click(function (){
        window.location.replace('http://localhost:3000/classes.php?bloco='+ $(this).attr("data-id"))
    })
    $(".tile-class").click(function (){
        window.location.replace('http://localhost:3000/workspace.php?class='+ $(this).attr("data-id") + "&name=" + $(this).attr("data-name") )
    })

    $(".search").click(function (){
        alert("oi")
        window.location.replace('http://localhost:3000/workspace.php?' +
            'class='+ $(this).attr("data-id") +
            "&name=" + $(this).attr("data-name") +
            "&pesquisa=" + $(this).attr("pesquisa")
        )
    })

})