<?php
// Récupère les paramètres de tri depuis l'URL, ou définit des valeurs par défaut
$sort = $_GET['sort'] ?? 'a.date_creation';
$order = $_GET['order'] ?? 'desc';
$nextOrder = $order === 'asc' ? 'desc' : 'asc';

// Fonction pour afficher une flèche ↑ ou ↓ si la colonne est triée
function arrow($col, $currentSort, $order)
{
    if ($col !== $currentSort) return '';
    return $order === 'asc' ? ' ↓ ' : ' ↑ ';
}
?>

<h1>Monitoring du blog</h1>

<table class="monitoring-table">
  <thead>
    <tr>
      <th>
        <a href="index.php?action=showMonitoring&sort=a.title&order=<?= $nextOrder ?>">
          Titre<?= arrow('a.title', $sort, $order) ?>
        </a>
      </th>
      <th>
        <a href="index.php?action=showMonitoring&sort=a.views&order=<?= $nextOrder ?>">
          Vues<?= arrow('a.views', $sort, $order) ?>
        </a>
      </th>
      <th>
        <a href="index.php?action=showMonitoring&sort=comment_count&order=<?= $nextOrder ?>">
          Commentaires<?= arrow('comment_count', $sort, $order) ?>
        </a>
      </th>
      <th>
        <a href="index.php?action=showMonitoring&sort=a.date_creation&order=<?= $nextOrder ?>">
          Date de publication<?= arrow('a.date_creation', $sort, $order) ?>
        </a>
      </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($articles as $article): ?>
      <tr>
        <td><?= htmlspecialchars($article['title']) ?></td>
        <td><?= $article['views'] ?></td>
        <td><?= $article['comment_count'] ?></td>
        <td><?= (new DateTime($article['date_creation']))->format('d/m/Y') ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>