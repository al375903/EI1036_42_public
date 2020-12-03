<footer>
	<p>
	<img src="https://licensebuttons.net/l/by-sa/3.0/88x31.png" height="31px" /><br/>
	<time datetime="2020-10-26">2020</time>.</p>
	</p>
	<address>
		<p class="izq"> Written by
			<a href="al375903@uji.es" rev="author">Enrique Gimeno </a> &
			<a href="al375825@uji.es" rev="author"> Edgar Heredia</a>.</p>
		<p class="der"> Visit us at: 12006 UJI </p>
	</address>
</footer>
<script>
	fetch('datos.php')
	.then(response => response.json())
    //.then(json => console.log(json))
    .then(data => productoVisor(data))
	.catch(err => console.log('Fetch Error :', err))
</script>
</body>

</html>