	window.addEventListener("scroll",function(){
	var nav = document.querySelector("nav");
	nav.classList.toggle("sticky", window.scrollY > 0);
		})
	document.getElementById('mode-btn').addEventListener('click', () => {
	document.body.classList.toggle('dark');
	localStorage.setItem('mode' , document.body.classList);
	});

	if (localStorage.getItem('mode') != '') {
		document.body.classList.add(localStorage.getItem('mode'));
		document.getElementById('mode-btn').checked = true;
	}


   
    function ShowConfirm() {
        var confirmation = confirm("Çıkış yapmak istediğinize emin misiniz?");
        if (confirmation) {
          alert("Başarılı bir şekilde çıkış yapılmıştır!");
        }
        return confirmation;
    };