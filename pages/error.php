<style>
    h1 {
        font-size: 80px;
        color: #3498db;
        text-shadow: 3px 3px 10px rgba(52, 152, 219, 0.6);
    }
    .back-button {
        background-color: #3498db;
        color: #fff;
        padding: 10px 20px;
        font-size: 20px;
        border-radius: 5px;
        text-decoration: none;
    }
    .back-button:hover {
        background-color: #2980b9;
    }
    .character-img {
        max-width: 200px;
        margin-top: 30px;
    }
    .notfound {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 60vh; 
        text-align: center; 
    }
    .notfound p{
        color: #2980b9;
    }
.button {
  appearance: none;

   background-color: transparent;
  -webkit-appearance: none;
  background-image: url('assets/btn_proximo.png');
  background-repeat: no-repeat;
  cursor: pointer;
  border: none;
  padding: 0;
  color: black;

  width: 100px;  /* Defina uma largura */
  height: 20px; /* Defina uma altura */
}

.button:hover {
transition: none;
outline: none;
transform: none;
  background-image: url('assets/btn_proximo_a.png');

}
.button:active {
   transition: none;
   outline: none;
   transform: none;
  background-image: url('assets/btn_proximo_b.png');

}
.button:focus {
   transition: none;
   outline: none;
   transform: none;
}

    @media (max-width: 768px) {

    .infoblocks {
        zoom: 0.90;
        width: auto;
        margin: 0;
       margin-top: 125px;
       height: 300px;
    }    
    .notfound {
        zoom: 0.90;
        width: auto;
        height: 32.5vh;
    } 

 }
</style>

<div class="infoblocks">
    <div class="notfound">
        <h1>404</h1>
        <p>Você se perdeu, aventureiro! Não encontramos a página que procurou.</p>
        <p>Não se preocupe! Você pode voltar para o caminho certo:</p>
        <a href="./"><button class="button">Voltar ao Início</button></a>
    </div>
</div>
