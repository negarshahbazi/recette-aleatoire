<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $recette->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <!-- ستون چپ: جزئیات دستور غذا -->
        <div class="recette-container">
            <h1>{{ $recette->name }}</h1>
            <h3>Ingrédients</h3>
            <ul>
                @foreach (json_decode($recette->ingredients) as $ingredient)
                    <li>{{ $ingredient }}</li>
                @endforeach
            </ul>
            <p><strong>Préparation :</strong> {{ $recette->preparationTime }} minutes</p>
            <p><strong>Cuisson :</strong> {{ $recette->cookingTime }} minutes</p>
            <p><strong>Pour :</strong> {{ $recette->serves }} personnes</p>
        </div>

        <!-- ستون راست: فرم ثبت نظر -->
        <div class="comment-container">
            <h2>Ajoutez votre commentaire</h2>
            <form action="{{ url('/recette/'.$recette->id.'/retour') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="commentaire">Commentaire :</label>
                    <textarea name="commentaire" id="commentaire" rows="5" placeholder="Partagez votre avis ici..." required></textarea>
                </div>
                <div class="form-group">
                    <label for="note">Note :</label>
                    <input type="number" name="note" id="note" min="1" max="5" placeholder="Entrez une note entre 1 et 5" required>
                </div>
                <button type="submit">Envoyer</button>
            </form>
        </div>
    </div>

    <!-- نمایش اطلاعات نظر ثبت‌شده زیر فرم -->
    @if(isset($commentaire) && isset($note))
        <div class="confirmation-box">
            <h2>Merci pour votre retour !</h2>
            <p><strong>Recette :</strong> {{ $recette->name }}</p>
            <p><strong>Note :</strong> {{ $note }} / 5</p>
            <p><strong>Commentaire :</strong> {{ $commentaire }}</p>
        </div>
    @endif
</body>
</html>
