<script>
	// @ts-nocheck

	let currentSection = 0;
	const sections = [];
	let cursor = null;
	let insideCursor = null;

	const handleScroll = (e) => {
		e.preventDefault();

		if (e.deltaY > 0 && currentSection < sections.length - 1) {
			currentSection++;
		} else if (e.deltaY < 0 && currentSection > 0) {
			currentSection--;
		}

		scrollToSection(currentSection);
	};

	const handleMouseMove = (e) => {
		cursor.style.left = `${e.clientX - 45}px`
		cursor.style.top = `${e.clientY - 45}px`

		insideCursor.style.left = `${e.clientX  - 5}px`
		insideCursor.style.top = `${e.clientY - 5}px`

		setTimeout(updateCursor, 100);
	}

	function scrollToSection(index) {
		const targetPosition = sections[index].offsetTop;
		window.scrollTo({
			top: targetPosition,
			behavior: 'smooth'
		});
	}
</script>

<body role="application" on:mousemove={handleMouseMove} on:mousewheel={handleScroll}>
	<div class="absoluteElements">
		<div bind:this={cursor} class="circleMouse" />
		<div bind:this={insideCursor} class="insideCircle" />
		<div class="navbarDiv">
			<button class="navbarButton"><a class="navbarA" href="">about me</a></button>
			<div class="spacerNavbar" />
			<button class="navbarButton"><a class="navbarA" href="">projects</a></button>
			<div class="spacerNavbar" />
			<button class="navbarButton"><a class="navbarA" href="">nword</a></button>
			<div class="spacerNavbar" />
			<button class="navbarButton"><a class="navbarA" href="">test</a></button>
		</div>
	</div>

	<div class="section" id="sec1" bind:this={sections[0]}>
		<div class="MainTittleSection">
			<h1 id="mainTittle">WELCOME</h1>
		</div>
	</div>
	<div class="section" id="sec2" bind:this={sections[1]}>
		<div class="MainTittleSection">
			<h1 id="mainTittle">WELCOME</h1>
		</div>
	</div>
	<div class="section" id="sec3" bind:this={sections[2]}>
		<div class="MainTittleSection">
			<h1 id="mainTittle">WELCOME</h1>
		</div>
	</div>
</body>

<!-- 
----colors----

black : 141416


-->

<style>
	@import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;500&display=swap');

	* {
		font-family: 'Roboto', sans-serif;
		padding: 0;
		margin: 0;
		overflow: hidden;
		cursor: none;
	}

	body {
		padding: 0;
		margin: 0;
	}

	.circleMouse {
		position: absolute;
		width: 100px;
		height: 100px;
		border-radius: 50%;
		transition: 0.1s ease;
		background-color: white;
		mix-blend-mode: difference; /* Changez le mode de fusion selon vos préférences */
		pointer-events: none; /* Assurez-vous que le cercle ne bloque pas les événements de la souris */
	}

	.insideCircle {
		position: absolute;
		width: 20px;
		z-index: 20;
		height: 20px;
		border-radius: 50%;
		background-color: black;
		opacity: 70%;
		pointer-events: none;
	}

	.section {
		display: flex;
		width: 100vw;
		height: 100vh;
		justify-content: center;
		align-items: center;
	}

	#sec1 {
		background-color: #141416;
	}

	#sec2 {
		background-color: white;
	}

	#sec3 {
		background-color: black;
	}

	#mainTittle {
		font-size: 200px;
		color: white;
		animation: tracking-in-expand 1s ease forwards;
		margin: 0;
		margin-bottom: 100px;
	}

	.navbarDiv {
		position: fixed;
		top: 90%;
		left: 50%;
		display: flex;
		justify-content: space-between;
		width: 30%;
		align-items: center;
		transform: translate(-50%, -50%);
		height: 70px;
	}

	.navbarButton {
		min-width: 70px;
		min-height: 70px;
		border-radius: 100px;
		background-color: #141416;
		font-family: 'Roboto', sans-serif;
		border: 2px solid #2f2f31;
	}

	.navbarA {
		text-decoration: none;
		font-family: 'Roboto', sans-serif;
		font-weight: bolder;
		color: #2f2f31;
	}

	.spacerNavbar {
		width: 100%;
		height: 2px;
		background-color: #2f2f31;
	}

	.navbarButton:hover {
		color: white;
		border: 2px solid white;
		transition: 1s ease;
	}

	.navbarA:hover {
		color: white;
		transition: 1s ease;
	}

	.MainTittleSection {
		display: flex;
	}

	@-webkit-keyframes tracking-in-expand {
		0% {
			letter-spacing: -0.5em;
			opacity: 0;
		}
		40% {
			opacity: 0.6;
		}
		100% {
			opacity: 1;
		}
	}
	@keyframes tracking-in-expand {
		0% {
			letter-spacing: -0.5em;
			opacity: 0;
		}
		40% {
			opacity: 0.6;
		}
		100% {
			opacity: 1;
		}
	}
</style>
