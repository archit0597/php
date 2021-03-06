/*
 * Translated default messages for the jQuery validation plugin.
 * Locale: RO (Romanian, limba rom  n  )
 */
(function ($) {
	$.extend($.validator.messages, {
		required: "Acest c  mp este obligatoriu.",
		remote: "Te rug  m s   completezi acest c  mp.",
		email: "Te rug  m s   introduci o adres   de email valid  ",
		url: "Te rug  m sa introduci o adres   URL valid  .",
		date: "Te rug  m s   introduci o dat   corect  .",
		dateISO: "Te rug  m s   introduci o dat   (ISO) corect  .",
		number: "Te rug  m s   introduci un num  r   ntreg valid.",
		digits: "Te rug  m s   introduci doar cifre.",
		creditcard: "Te rug  m s   introduci un numar de carte de credit valid.",
		equalTo: "Te rug  m s   reintroduci valoarea.",
		accept: "Te rug  m s   introduci o valoare cu o extensie valid  .",
		maxlength: $.validator.format("Te rug  m s   nu introduci mai mult de {0} caractere."),
		minlength: $.validator.format("Te rug  m s   introduci cel pu  in {0} caractere."),
		rangelength: $.validator.format("Te rug  m s   introduci o valoare   ntre {0}   i {1} caractere."),
		range: $.validator.format("Te rug  m s   introduci o valoare   ntre {0}   i {1}."),
		max: $.validator.format("Te rug  m s   introduci o valoare egal sau mai mic   dec  t {0}."),
		min: $.validator.format("Te rug  m s   introduci o valoare egal sau mai mare dec  t {0}.")
	});
}(jQuery));