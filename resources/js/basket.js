$(document).ready(function(){
    $("select#quantity").change(function(){
        var selectedQuantity = $(this).children("option:selected").val();
        alert("You have selected the quantity - " + selectedQuantity);
        this.form.submit();
    });
})