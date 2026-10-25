<link rel="stylesheet" href="assets/style.css">
<div class="formulari-projecte">

    <div class="formulari-info">
        <p class="etiqueta">ALTA DE PROJECTE</p>
        <h2>Afegir un encàrrec</h2>
        <p class="descripcio-formulari">Emplena totes les dades. Les etiquetes s'han d'escriure separades per comes.</p>

        <div class="avis">
            Les dades no es desen entre peticions, tal com demana el repte.
        </div>
    </div>

    <form action="" method="POST" class="formulari">

        <div class="camp">
            <label for="titol">Títol</label>
            <input type="text" id="titol" name="titol" placeholder="Ex.: Redisseny d'una botiga" required>
        </div>

        <div class="camp">
            <label for="client">Client</label>
            <input type="text" id="client" name="client" placeholder="Nom del client" required>
        </div>

        <div class="camps-dobles">
            <div class="camp">
                <label for="hores">Hores estimades</label>
                <input type="number" id="hores" name="hores" min="1" required>
            </div>

            <div class="camp">
                <label for="estat">Estat</label>
                <select id="estat" name="estat">
                    <option value="Pendent">Pendent</option>
                    <option value="En procés">En procés</option>
                    <option value="Acabat">Acabat</option>
                </select>
            </div>
        </div>

        <div class="camp">
            <label for="etiquetes">Etiquetes</label>
            <input type="text" id="etiquetes" name="etiquetes" placeholder="PHP, Docker, Responsive" required>
        </div>

        <button type="submit" class="boto-formulari">Afegir encàrrec</button>

    </form>

</div>