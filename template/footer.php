

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<script>

    $(document).ready(function (e){


        $(".tile-bloco").click(function (){
            window.location.replace('http://10.115.50.63:8080/classes.php?bloco='+ $(this).attr("data-id"))
        })
        $(".tile-class").click(function (){
            window.location.replace('http://10.115.50.63:8080/workspace.php?class='+ $(this).attr("data-id") + "&name=" + $(this).attr("data-name") )
        })

        $(".search").click(function (){
            window.location.replace('http://10.115.50.63:8080/workspace.php?' +
                'class='+ $(this).attr("data-class") +
                "&name=" + $(this).attr("data-name") +
                "&pesquisa=" + $(".pesquisa-value").val()
            )
        })

    })
</script>

</html>