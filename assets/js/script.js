$(document).ready(function (e){


    $(".tile-bloco").click(function (){
        window.location.replace('/classes.php?bloco='+ $(this).attr("data-id"))
    })
    $(".tile-class").click(function (){
        window.location.replace('/workspace.php?class='+ $(this).attr("data-id") + "&name=" + $(this).attr("data-name") )
    })

    $(".search").click(function (){
        window.location.replace('/workspace.php?' +
            'class='+ $(this).attr("data-class") +
            "&name=" + $(this).attr("data-name") +
            "&pesquisa=" + $(".pesquisa-value").val()
        )
    })

    $(".show-patrimony-form").click(function(e){
        $(".patrimony-form").toggleClass("hidden")
        $(".find-patrimony").toggleClass("hidden")
        if($(".patrimony-form").hasClass("hidden")){
            $(this).text("Adicionar item sem patrimônio")
        }else{
            $(this).text("Pesquisar item com patrimonio")
        }

    })






})