<!-- MyComponent.svelte -->
<script>
    export let first = "first";
    export let second = "second";
</script>

<div class="card">
	<div class="first-content">
		<span id="firstspan">{first}</span>
	</div>
	<div class="second-content">
		<div>
			<h2>{first} : </h2>
		</div>
		<div class="descSection">
			<span class="description">{second}</span>
		</div>
		<button class="viewMore">view more</button>
	</div>
</div>

<style>
	@import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;500&display=swap');


	.card {
		width: 190px;
		height: 254px;
        color: #2f2f31;
		background: #141416;
		transition: all 0.4s;
        border: 2px solid #2f2f31;
		border-radius: 10px;
        text-shadow: 10px 10px #141416;
		font-size: 30px;
		font-weight: 900;
	}

	.description {
		width: 80%;
	}

    #firstspan {
        max-width: 70%;
    }

	.card:hover {
		border-radius: 15px;
		z-index: 18;
		cursor: pointer;
		transform: scale(2.1);
        color: #2f2f31;
        text-shadow: none;
    	box-shadow: 12px 12px 0px 0px #2f2f31;
	}

	.first-content {
		height: 100%;
		width: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
		opacity: 1;
		border-radius: 15px;
	}

	.card:hover .first-content {
		visibility: hidden;
		height: 0%;
		transition: 0s;
		opacity: 0;
	}

	.descSection {
		width: 80%;
	}

	.second-content {
		height: 100%;
		width: 100%;
		opacity: 0;
		visibility: hidden;
		display: flex;
		justify-content: center;
		flex-direction: column;
		background-color: white;
		gap: 20px;
		align-items: center;
		transition: 0s;
		border-radius: 15px;
		/* transition: all 0.4s; */
		font-size: 0.7rem;
	}

	.viewMore {
		padding: 5px;
		border: 2px solid black;
		transform: scale(0.8);
		background-color: white;
		font-family: 'Roboto', sans-serif;
		font-weight: bold;
	}


	.card:hover .second-content {
		visibility: visible;
		opacity: 1;
		height: 100%;
	}
</style>


<!-- 
----colors----

black : 141416
grey : 2f2f31

-->