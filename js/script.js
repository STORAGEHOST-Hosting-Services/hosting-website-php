function getInfos(data) {
    let info = "";

    switch (data) {
        case "app":
            info = "<strong><p class='text-center'>Serveur d'application</p></strong><br/>" +
                "<p class='text-center'>Container Docker utilisé pour déployer votre application.</p>" +
                "<div class='table'>" +
                "<table class='table'>" +
                "<thead>" +
                "<th scope='col'>Etat</th>" +
                "<th scope='col'>Caractéristiques</th>" +
                "<th scope='col'>Prix mensuel</th>" +
                "</thead>" +
                "<tbody>" +
                "<tr>" +
                "<td class='text-danger'>Indisponible</td>" +
                "<td>Container Docker,<br/>1 vCPU,<br/>1024 Mo RAM,<br/>5 Go stockage</td>" +
                "<td>3 CHF/mois</td>" +
                "</tr>" +
                "</tbody>" +
                "</table>" +
                "</div>"
            break;
        case "s1s":
            info = "<strong><p class='text-center'>VPS s1.small</p></strong><br/>" +
                "<p class='text-center'>Idéal pour l’exécution de petits serveurs d’applications (bots).</p>" +
                "<div class='table'>" +
                "<table class='table'>" +
                "<thead>" +
                "<th scope='col'>Etat</th>" +
                "<th scope='col'>Caractéristiques</th>" +
                "<th scope='col'>Prix mensuel</th>" +
                "</thead>" +
                "<tbody>" +
                "<tr>" +
                "<td class='text-success'>Disponible</td>" +
                "<td>2 vCPU,<br/>2 Go RAM,<br/>25 Go stockage</td>" +
                "<td>5 CHF/mois</td>" +
                "</tr>" +
                "</tbody>" +
                "</table>" +
                "</div>"
            break;
        case "s1m":
            info = "<strong><p class='text-center'>VPS s1.medium</p></strong><br/>" +
                "<p class='text-center'>Optimal pour l’exécution de petites applications ou pour un petit serveur Web.</p>" +
                "<div class='table'>" +
                "<table class='table'>" +
                "<thead>" +
                "<th scope='col'>Etat</th>" +
                "<th scope='col'>Caractéristiques</th>" +
                "<th scope='col'>Prix mensuel</th>" +
                "</thead>" +
                "<tbody>" +
                "<tr>" +
                "<td class='text-success'>Disponible</td>" +
                "<td>2 vCPU,<br/>4 Go RAM,<br/>50 Go stockage</td>" +
                "<td>10 CHF/mois</td>" +
                "</tr>" +
                "</tbody>" +
                "</table>" +
                "</div>"
            break;
        case "s1l":
            info = "<strong><p class='text-center'>VPS s1.large</p></strong><br/>" +
                "<p class='text-center'>Optimal pour l'exécution d’applications demandant plus de mémoire vive (serveur Web fréquemment utilisé).</p>" +
                "<div class='table'>" +
                "<table class='table'>" +
                "<thead>" +
                "<th scope='col'>Etat</th>" +
                "<th scope='col'>Caractéristiques</th>" +
                "<th scope='col'>Prix mensuel</th>" +
                "</thead>" +
                "<tbody>" +
                "<tr>" +
                "<td class='text-success'>Disponible</td>" +
                "<td>4 vCPU,<br/>8 Go RAM,<br/>75 Go stockage</td>" +
                "<td>15 CHF/mois</td>" +
                "</tr>" +
                "</tbody>" +
                "</table>" +
                "</div>"
            break;
        case "s2s":
            info = "<strong><p class='text-center'>VPS s2.small</p></strong><br/>" +
                "<p class='text-center'>Optimal pour l'exécution d’applications demandant plus de mémoire vive (serveur Web fréquemment utilisé).</p>" +
                "<div class='table'>" +
                "<table class='table'>" +
                "<thead>" +
                "<th scope='col'>Etat</th>" +
                "<th scope='col'>Caractéristiques</th>" +
                "<th scope='col'>Prix mensuel</th>" +
                "</thead>" +
                "<tbody>" +
                "<tr>" +
                "<td class='text-success'>Disponible</td>" +
                "<td>4 vCPU,<br/>16 Go RAM,<br/>150 Go stockage</td>" +
                "<td>20 CHF/mois</td>" +
                "</tr>" +
                "</tbody>" +
                "</table>" +
                "</div>"
            break;
        case "s2m":
            info = "<strong><p class='text-center'>VPS s2.medium</p></strong><br/>" +
                "<p class='text-center'>Optimal pour l'exécution d’applications demandant plus de mémoire vive (serveur Web très fréquemment utilisé/multisite, serveur de jeu, WebApp).</p>" +
                "<div class='table'>" +
                "<table class='table'>" +
                "<thead>" +
                "<th scope='col'>Etat</th>" +
                "<th scope='col'>Caractéristiques</th>" +
                "<th scope='col'>Prix mensuel</th>" +
                "</thead>" +
                "<tbody>" +
                "<tr>" +
                "<td class='text-success'>Disponible</td>" +
                "<td>6 vCPU,<br/>32 Go RAM,<br/>200 Go stockage</td>" +
                "<td>30 CHF/mois</td>" +
                "</tr>" +
                "</tbody>" +
                "</table>" +
                "</div>"
            break;
        case "s2l":
            info = "<strong><p class='text-center'>VPS s2.large</p></strong><br/>" +
                "<p class='text-center'>Optimal pour l'exécution d’applications demandant plus de mémoire vive (serveur Web très fréquemment utilisé/multisite, serveur de jeu, WebApp).</p>" +
                "<div class='table'>" +
                "<table class='table'>" +
                "<thead>" +
                "<th scope='col'>Etat</th>" +
                "<th scope='col'>Caractéristiques</th>" +
                "<th scope='col'>Prix mensuel</th>" +
                "</thead>" +
                "<tbody>" +
                "<tr>" +
                "<td class='text-success'>Disponible</td>" +
                "<td>8 vCPU,<br/>64 Go RAM,<br/>300 Go stockage</td>" +
                "<td>50 CHF/mois</td>" +
                "</tr>" +
                "</tbody>" +
                "</table>" +
                "</div>"
            break;
    }
    return info
}