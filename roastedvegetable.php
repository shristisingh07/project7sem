<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roasted Vegetable Recipe</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            color: #333;
            background-color: #f9f9f9;
        }
        
        h1 {
            color: #2c3e50;
            text-align: center;
            border-bottom: 2px solid #e74c3c;
            padding-bottom: 10px;
        }
        
        h2 {
            color: #e74c3c;
            margin-top: 25px;
        }
        
        .recipe-info {
            display: flex;
            justify-content: space-around;
            background-color: #eee;
            padding: 10px;
            border-radius: 5px;
            margin: 20px 0;
        }
        
        .info-item {
            text-align: center;
        }
        
        .info-item span {
            font-weight: bold;
            color: #e74c3c;
        }
        
        ul, ol {
            padding-left: 25px;
        }
        
        li {
            margin-bottom: 8px;
        }
        
        .tips {
            background-color: #fff8e1;
            padding: 15px;
            border-left: 4px solid #ffc107;
            margin: 20px 0;
        }
        
        .back-button {
            display: block;
            width: 120px;
            margin: 30px auto 0;
            padding: 10px;
            background-color: #2c3e50;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        
        .back-button:hover {
            background-color: #e74c3c;
        }
    </style>
</head>
<body>
    <h1>Easy Roasted Vegetables</h1>
    
    <div class="recipe-info">
        <div class="info-item">Prep: <span>15 mins</span></div>
        <div class="info-item">Cook: <span>30 mins</span></div>
        <div class="info-item">Total: <span>45 mins</span></div>
        <div class="info-item">Servings: <span>4</span></div>
    </div>
    
    <p>This simple roasted vegetable recipe brings out the natural sweetness and flavors of fresh vegetables. Perfect as a side dish or as a meal on its own!</p>
    
    <h2>Ingredients</h2>
    <ul>
        <li>2 cups broccoli florets</li>
        <li>2 cups cauliflower florets</li>
        <li>1 large red bell pepper, sliced</li>
        <li>1 large carrot, sliced</li>
        <li>1 medium zucchini, sliced</li>
        <li>1 red onion, cut into wedges</li>
        <li>3 tablespoons olive oil</li>
        <li>1 teaspoon salt</li>
        <li>½ teaspoon black pepper</li>
        <li>1 teaspoon dried thyme</li>
        <li>1 teaspoon garlic powder</li>
        <li>2 tablespoons fresh parsley, chopped (for garnish)</li>
    </ul>
    
    <h2>Instructions</h2>
    <ol>
        <li>Preheat oven to 425°F (220°C).</li>
        <li>Wash and prepare all vegetables, cutting them into even-sized pieces for uniform cooking.</li>
        <li>In a large bowl, toss the vegetables with olive oil, salt, pepper, thyme, and garlic powder until evenly coated.</li>
        <li>Spread the vegetables in a single layer on a large baking sheet. Don't overcrowd the pan.</li>
        <li>Roast in the preheated oven for 25-30 minutes, stirring halfway through, until vegetables are tender and slightly caramelized.</li>
        <li>Remove from oven and transfer to a serving dish. Garnish with fresh parsley.</li>
        <li>Serve immediately while hot.</li>
    </ol>
    
    <div class="tips">
        <h3>Chef's Tips:</h3>
        <p>• For extra crispiness, make sure the vegetables are completely dry before tossing with oil.</p>
        <p>• Feel free to substitute with your favorite vegetables - sweet potatoes, brussels sprouts, or asparagus work well too.</p>
        <p>• Add a sprinkle of parmesan cheese or a drizzle of balsamic glaze before serving for extra flavor.</p>
    </div>
    
    <a href="javascript:history.back()" class="back-button">Back</a>
    
    <script>
        // Simple JavaScript to ensure back button works
        document.querySelector('.back-button').addEventListener('click', function() {
            window.history.back();
        });
    </script>
</body>
</html>