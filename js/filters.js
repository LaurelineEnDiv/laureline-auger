jQuery(document).ready(function ($) {
    // Fonction pour récupérer les réalisations filtrées
    function fetchRealisations(categorySlug) {
        const data = {
            action: "fetch_realisations",
            filters: {
                categorie: categorySlug
            }
        };

        $.post(ajaxurl, data, function (response) {
            if (response.success && response.data.html.trim()) {
                $(".realisations-block-container").html(response.data.html);
            } 
        });
    }

    // Gestion du clic sur les catégories
    $(".filter-option").on("click", function () {
        $(".filter-option").removeClass("selected");
        $(this).addClass("selected");

        const categorySlug = $(this).data("term-id");
        fetchRealisations(categorySlug);
    });
});
