$(document).ready(function() {
	$("#submit").click(function() {
		var name = $("#name").val();
		var email = $("#email").val();
		var message = $("#message").val();
		var contact = $("#contact").val();

		$("#returnmessage").empty(); // Чтобы очистить предыдущее сообщение об ошибке / успехе.
		
		// Проверка пустых полей.
		
		if (name == '' || email == '' || contact == '') {
			alert("Please Fill Required Fields");
		} else {

		// Возвращает сообщение об успешном представления данных, когда введенная информация хранится в базе данных.

		$.post("contact_form.php", {
		name1: name,
		email1: email,
		message1: message,
		contact1: contact
		}, 
		
		function(data) {
			$("#returnmessage").append(data); // Возвращаем сообщение об отправке или ошибке.
			if (data == "Ваш запрос был получен, мы свяжемся с Вами в ближайшее время.") {
				$("#form")[0].reset(); // Чтобы сбросить успешные поля формы.
			}
		});
		}
	});
});