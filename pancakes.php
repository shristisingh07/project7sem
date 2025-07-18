<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oats and Banana Pancakes Recipe</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f5f0;
        }
        
        h1 {
            color: #8b4513;
            text-align: center;
            border-bottom: 2px solid #d2b48c;
            padding-bottom: 10px;
        }
        
        h2 {
            color: #a0522d;
            margin-top: 25px;
        }
        
        .recipe-info {
            background-color: #fff8e1;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
        }
        
        .info-item {
            display: flex;
            margin-bottom: 8px;
        }
        
        .info-label {
            font-weight: bold;
            min-width: 120px;
            color: #8b4513;
        }
        
        ul, ol {
            padding-left: 25px;
        }
        
        li {
            margin-bottom: 8px;
        }
        
        .back-button {
            display: block;
            width: 120px;
            background-color: #8b4513;
            color: white;
            text-align: center;
            padding: 10px;
            margin: 30px auto 0;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
            border: none;
        }
        
        .back-button:hover {
            background-color: #a0522d;
        }
        
        .tips {
            font-style: italic;
            background-color: #f5f5dc;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Oats and Banana Pancakes</h1>
    
    <div class="recipe-info">
        <div class="info-item">
            <span class="info-label">Prep Time:</span>
            <span>5 minutes</span>
        </div>
        <div class="info-item">
            <span class="info-label">Cook Time:</span>
            <span>10 minutes</span>
        </div>
        <div class="info-item">
            <span class="info-label">Total Time:</span>
            <span>15 minutes</span>
        </div>
        <div class="info-item">
            <span class="info-label">Servings:</span>
            <span>2 (makes 6-8 pancakes)</span>
        </div>
    </div>
    
    <h2>Ingredients</h2>
    <ul>
        <li>1 cup rolled oats</li>
        <li>2 ripe bananas</li>
        <li>2 eggs (or flax eggs for vegan option)</li>
        <li>1/2 teaspoon cinnamon</li>
        <li>1 teaspoon vanilla extract</li>
        <li>1/2 teaspoon baking powder</li>
        <li>Pinch of salt</li>
        <li>1-2 tablespoons milk (any kind) - optional for consistency</li>
        <li>Butter or oil for cooking</li>
    </ul>
    
    <h2>Instructions</h2>
    <ol>
        <li>Add the oats to a blender and blend until they form a flour-like consistency.</li>
        <li>Add the bananas, eggs, cinnamon, vanilla extract, baking powder, and salt to the blender.</li>
        <li>Blend until smooth. If the batter is too thick, add a tablespoon or two of milk to thin it out.</li>
        <li>Heat a non-stick pan or griddle over medium heat and add a small amount of butter or oil.</li>
        <li>Pour about 1/4 cup of batter for each pancake onto the hot pan.</li>
        <li>Cook for 2-3 minutes until bubbles form on the surface and the edges look set.</li>
        <li>Flip carefully and cook for another 1-2 minutes on the other side until golden brown.</li>
        <li>Repeat with the remaining batter, adding more butter or oil to the pan as needed.</li>
    </ol>
    
    <div class="tips">
        <h3>Tips:</h3>
        <p>Serve with maple syrup, fresh fruits, or nut butter. For extra protein, you can add a scoop of protein powder to the batter.</p>
    </div>
    
    <button class="back-button" onclick="window.history.back()">Back</button>
    
    <script>
        // JavaScript to ensure the back button works
        document.querySelector('.back-button').addEventListener('click', function() {
            window.history.back();
        });
    </script>
</body>
</html>