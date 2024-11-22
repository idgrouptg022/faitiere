<footer>
    <div class="address-container">
        <figure class="logo">
            <img src="{{ asset('assets/images/logo-white.png') }}" alt="LOGO FCT">
        </figure>
        <div class="contact-info">
            <p>
                <span class="bold">Adresse:</span>
                <span>Quartier administratif. Rue de la présidence Dans l’enceinte de la préfecture du Golfe</span>
            </p>
            <p>
                <span class="bold">Email:</span>
                <span>efct2020@gmail.com</span>
            </p>
            <p>
                <span class="bold">BP:</span>
                <span>1298 Lomé-Togo</span>
            </p>
            <p>
                <span class="bold">Téléphone:</span>
                <span>(+228) 93 82 43 62</span><br>
                <span>(+228) xx xx xx xx</span>
            </p>
        </div>
    </div>
    <div class="links-container">
        <h2>Quelques liens</h2>
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">A Propos</a></li>
            <li><a href="#">Regions</a></li>
            <li><a href="#">Actu-communes</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
    <div class="newsletter-container">
        <h3 class="newsletter-title">Abonnez vous à notre newsletter</h3>
        <p class="newsletter-text">Vous recevrez des notifications mails sur les actualités de la Faitière</p>
        <form action="#" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Votre adresse email" autocomplete="off">
            <button type="submit">S'abonner</button>
        </form>
        <div class="social-media-icons">
            <a href="https://www.facebook.com/FCT228" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.linkedin.com/in/fa%C3%AEti%C3%A8re-des-communes-du-togo-268a57338/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://x.com/fct228" target="_blank"><i class="fab fa-x-twitter"></i></a>
            <a href="https://www.youtube.com/@fcttv5006/featured" target="_blank"><i class="fab fa-youtube"></i></a>
    </div>
</footer>
<div class="footer-signature">
    <div>Copyright &copy; 2024, <span class="bold">Faitière Des Communes du TOGO</span>. Tous droits réservés</div>
    <div class="design-by">Développé par <span class="bold">ID Group</span></div>
</div>
