<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health-Focused Indian Recipes for Adults 40+</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto+Slab:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f0f7f4;
            color: #333;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            position: relative;
            z-index: 2;
        }

        header {
            text-align: center;
            padding: 30px 0 20px;
            color: #2c5e2e;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        header h1 {
            font-family: 'Roboto Slab', serif;
            font-size: 3.2rem;
            margin-bottom: 10px;
            background: linear-gradient(to right, #2c5e2e, #4CAF50, #2c5e2e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
            position: relative;
            padding-bottom: 15px;
        }

        header h1::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 4px;
            background: linear-gradient(to right, #2c5e2e, #4CAF50);
            border-radius: 2px;
        }

        header p {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
            color: #2c5e2e;
            text-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }

        .health-tags {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .health-tag {
            background: #e8f5e9;
            color: #2c5e2e;
            border-radius: 20px;
            padding: 6px 15px;
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .button-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
            margin: 25px 0;
        }

        .category-btn {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 12px;
            padding: 14px 25px;
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .category-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255,255,255,0.3), rgba(255,255,255,0));
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .category-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
            color: #fff;
        }

        .category-btn:hover::before {
            opacity: 1;
        }

        .category-btn i {
            font-size: 1.4rem;
            transition: all 0.3s ease;
        }

        .category-btn:hover i {
            transform: scale(1.2);
        }

        .breakfast-btn:hover { background: linear-gradient(135deg, #8BC34A 0%, #CDDC39 100%); }
        .lunch-btn:hover { background: linear-gradient(135deg, #4CAF50 0%, #81C784 100%); }
        .snacks-btn:hover { background: linear-gradient(135deg, #FFC107 0%, #FFD54F 100%); }
        .dinner-btn:hover { background: linear-gradient(135deg, #2196F3 0%, #64B5F6 100%); }

        .recipe-display {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
            margin-top: 20px;
            display: none;
            position: relative;
            overflow: hidden;
            border: 1px solid #e0f2e1;
        }

        .recipe-display::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(to right, #2c5e2e, #4CAF50);
            border-radius: 4px 4px 0 0;
        }

        .recipe-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .recipe-title {
            font-family: 'Roboto Slab', serif;
            font-size: 2.3rem;
            color: #2c5e2e;
            flex: 1;
            position: relative;
            padding-bottom: 10px;
        }

        .recipe-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, #2c5e2e, #4CAF50);
            border-radius: 2px;
        }

        .controls {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .control-btn {
            background: #4caf50;
            color: white;
            border: none;
            border-radius: 30px;
            padding: 12px 25px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .control-btn:hover {
            background: #388e3c;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.15);
        }

        .timer-display {
            background: rgba(255,255,255,0.9);
            color: #2c5e2e;
            padding: 8px 15px;
            border-radius: 30px;
            font-weight: 600;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            display: none;
            min-width: 70px;
            text-align: center;
        }

        .recipe-content {
            display: flex;
            flex-direction: column;
            gap: 35px;
        }
        
        .recipe-top {
            display: flex;
            flex-wrap: wrap;
            gap: 35px;
        }
        
        .recipe-image-container {
            flex: 1;
            min-width: 300px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            height: 320px;
            position: relative;
        }
        
        .recipe-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .recipe-image-container:hover .recipe-image {
            transform: scale(1.05);
        }

        .recipe-details {
            flex: 2;
            min-width: 300px;
            display: flex;
            flex-direction: column;
            gap: 25px;
        }
        
        .lang-tabs-container {
            background: #e8f5e9;
            padding: 12px;
            border-radius: 30px;
            margin-bottom: 15px;
            display: inline-block;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        .lang-tabs {
            display: flex;
            gap: 10px;
        }

        .lang-tab {
            background: #f1f8e9;
            border: 1px solid #c8e6c9;
            padding: 10px 25px;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 1.1rem;
        }

        .lang-tab.active {
            background: #4caf50;
            color: white;
            border-color: #4caf50;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .recipe-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 15px;
        }
        
        .recipe-card {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
            border: 1px solid #e0f2e1;
        }
        
        .recipe-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.1);
        }
        
        .recipe-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, #2c5e2e, #4CAF50);
        }
        
        .card-title {
            font-family: 'Roboto Slab', serif;
            font-size: 1.6rem;
            color: #2c5e2e;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #a5d6a7;
            display: inline-block;
        }
        
        .card-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        
        .lang-content {
            display: none;
        }

        .lang-content.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .ingredients-list, .steps-list {
            padding-left: 20px;
            margin-bottom: 15px;
        }

        .ingredients-list li, .steps-list li {
            margin-bottom: 12px;
            line-height: 1.7;
            position: relative;
            padding-left: 15px;
        }

        .ingredients-list li::before {
            content: '•';
            color: #4caf50;
            font-size: 1.5rem;
            position: absolute;
            left: -10px;
            top: -5px;
        }

        .steps-list li {
            counter-increment: step-counter;
            margin-bottom: 20px;
        }

        .steps-list li::before {
            content: counter(step-counter);
            background: #4caf50;
            color: white;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            position: absolute;
            left: -30px;
            top: 0;
            font-size: 0.9rem;
        }

        .benefits-text {
            line-height: 1.8;
            background: #fff;
            padding: 18px;
            border-radius: 10px;
            border-left: 4px solid #4caf50;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            flex-grow: 1;
        }

        footer {
            text-align: center;
            padding: 30px 0;
            color: #2c5e2e;
            margin-top: 40px;
            font-size: 1.1rem;
        }

        .hidden {
            display: none;
        }

        .difficulty-level {
            display: inline-block;
            background: #4caf50;
            color: white;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            margin-left: 15px;
            vertical-align: middle;
        }
        
        .prep-time {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #f1f8e9;
            padding: 8px 15px;
            border-radius: 30px;
            margin-top: 10px;
            font-weight: 500;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .recipe-stats {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }
        
        .stat-box {
            background: #f1f8e9;
            border-radius: 12px;
            padding: 15px;
            flex: 1;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c5e2e;
            margin-bottom: 5px;
        }
        
        .stat-label {
            font-size: 0.9rem;
            color: #6c757d;
        }
        
        .category-label {
            position: absolute;
            top: 10px;
            right: 0px;
            background: #4caf50;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            z-index: 2;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .health-info {
            background: #e8f5e9;
            border-radius: 12px;
            padding: 15px;
            margin-top: 20px;
            border-left: 4px solid #4caf50;
        }
        
        .health-info h4 {
            color: #2c5e2e;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .health-info ul {
            padding-left: 25px;
        }
        
        .health-info li {
            margin-bottom: 8px;
            line-height: 1.6;
        }
        
        .health-info li::marker {
            color: #4caf50;
        }
        
        /* Responsive design */
        @media (max-width: 768px) {
            .recipe-top {
                flex-direction: column;
            }
            
            .recipe-image-container {
                height: 250px;
            }
            
            .button-container {
                gap: 10px;
            }
            
            .category-btn {
                padding: 12px 20px;
                font-size: 1rem;
            }
            
            .recipe-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .controls {
                width: 100%;
                justify-content: space-between;
            }
            
            header h1 {
                font-size: 2.5rem;
            }
            
            .recipe-cards {
                grid-template-columns: 1fr;
            }
            
            .category-label {
                top: 20px;
                right: 20px;
            }
        }
        
        .label {
            background: #4caf50;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            z-index: 2;
            width: 10rem;
            margin-top: 1rem;
            margin-left: 1rem;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            display: inline-block;
        }
        
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1><i class="fas fa-heartbeat"></i> Health-Focused Indian Recipes</h1>
            <p>Nutritious and delicious recipes specially curated for adults 40+</p>
            <div class="health-tags">
                <div class="health-tag"><i class="fas fa-heart"></i> Heart Healthy</div>
                <div class="health-tag"><i class="fas fa-apple-alt"></i> Low Sugar</div>
                <div class="health-tag"><i class="fas fa-seedling"></i> Plant-Based</div>
                <div class="health-tag"><i class="fas fa-weight"></i> Weight Management</div>
                <div class="health-tag"><i class="fas fa-bolt"></i> Energy Boost</div>
            </div>
        </header>
        
        <div class="button-container">
            <button class="category-btn breakfast-btn" data-category="breakfast">
                <i class="fas fa-egg"></i> Breakfast
            </button>
            <button class="category-btn lunch-btn" data-category="lunch">
                <i class="fas fa-utensil-spoon"></i> Lunch
            </button>
            <button class="category-btn snacks-btn" data-category="snacks">
                <i class="fas fa-cookie-bite"></i> Snacks
            </button>
            <button class="category-btn dinner-btn" data-category="dinner">
                <i class="fas fa-moon"></i> Dinner
            </button>
        </div>
        
        <div class="recipe-display" id="recipeDisplay">
            <div class="category-label" id="categoryLabel">Breakfast</div>
            <div class="recipe-header">
                <h2 class="recipe-title" id="recipeTitle">Oats Idli with Spinach Chutney</h2>
                <div class="controls">
                    <button class="control-btn" id="randomBtn">
                        <i class="fas fa-random"></i> Random Recipe
                    </button>
                    <div class="timer-display" id="timerDisplay">5s</div>
                    <button class="control-btn" id="autoBtn">
                        <i class="fas fa-sync"></i> Auto Generate
                    </button>
                </div>
            </div>
            
            <div class="recipe-content">
                <div class="recipe-top">
                    <div class="recipe-image-container">
                        <img src="https://images.unsplash.com/photo-1562376552-7d8430b2fad2?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=600&w=800" class="recipe-image" id="recipeImage" alt="Oats Idli">
                    </div>
                    
                    <div class="recipe-details">
                        <div class="lang-tabs-container">
                            <div class="lang-tabs">
                                <div class="lang-tab active" data-lang="en">English</div>
                                <div class="lang-tab" data-lang="hi">हिंदी</div>
                            </div>
                        </div>
                        
                        <div class="prep-time">
                            <i class="fas fa-clock"></i> Prep Time: 15 min | Cook Time: 20 min
                        </div>
                        
                        <div class="recipe-stats">
                            <div class="stat-box">
                                <div class="stat-value">4.9</div>
                                <div class="stat-label">Rating</div>
                            </div>
                            <div class="stat-box">
                                <div class="stat-value">2</div>
                                <div class="stat-label">Servings</div>
                            </div>
                            <div class="stat-box">
                                <div class="stat-value">280</div>
                                <div class="stat-label">Calories</div>
                            </div>
                        </div>
                        
                        <div class="lang-content active" id="content-en">
                            <div class="recipe-cards">
                                <div class="recipe-card">
                                    <h3 class="card-title">Ingredients</h3>
                                    <div class="card-content">
                                        <ul class="ingredients-list" id="ingredientsListEn">
                                            <li>1 cup oats (ground into flour)</li>
                                            <li>1/2 cup semolina (rava)</li>
                                            <li>1 cup yogurt (low-fat)</li>
                                            <li>1 carrot, grated</li>
                                            <li>1/4 cup chopped coriander</li>
                                            <li>1 tsp mustard seeds</li>
                                            <li>1 tsp baking soda</li>
                                            <li>Salt to taste</li>
                                            <li>Water as needed</li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="recipe-card">
                                    <h3 class="card-title">Preparation Method</h3>
                                    <div class="card-content">
                                        <ol class="steps-list" id="stepsListEn">
                                            <li>Dry roast oats until aromatic, then grind to flour</li>
                                            <li>Mix oats flour, semolina, yogurt, and water to make batter</li>
                                            <li>Cover and rest for 20 minutes</li>
                                            <li>Add grated carrot, coriander, and salt</li>
                                            <li>Just before steaming, add baking soda and mix gently</li>
                                            <li>Pour batter into idli molds and steam for 12-15 minutes</li>
                                            <li>Serve hot with spinach chutney</li>
                                        </ol>
                                    </div>
                                </div>
                                
                                <div class="recipe-card">
                                    <h3 class="card-title">Health Benefits</h3>
                                    <div class="card-content">
                                        <p class="benefits-text" id="benefitsTextEn">Oats are rich in soluble fiber that helps lower cholesterol. Carrots provide beta-carotene for eye health. This low-fat, high-fiber breakfast helps maintain stable blood sugar levels and supports heart health.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="lang-content" id="content-hi">
                            <div class="recipe-cards">
                                <div class="recipe-card">
                                    <h3 class="card-title">सामग्री</h3>
                                    <div class="card-content">
                                        <ul class="ingredients-list" id="ingredientsListHi">
                                            <li>1 कप ओट्स (पीसकर आटा बनाएं)</li>
                                            <li>1/2 कप सूजी</li>
                                            <li>1 कप दही (कम वसा वाली)</li>
                                            <li>1 गाजर, कद्दूकस की हुई</li>
                                            <li>1/4 कप कटा हुआ धनिया</li>
                                            <li>1 चम्मच राई के दाने</li>
                                            <li>1 चम्मच बेकिंग सोडा</li>
                                            <li>नमक स्वादानुसार</li>
                                            <li>आवश्यकतानुसार पानी</li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="recipe-card">
                                    <h3 class="card-title">बनाने की विधि</h3>
                                    <div class="card-content">
                                        <ol class="steps-list" id="stepsListHi">
                                            <li>ओट्स को सुखा भूनें और पीसकर आटा बनाएं</li>
                                            <li>ओट्स का आटा, सूजी, दही और पानी मिलाकर बैटर बनाएं</li>
                                            <li>ढककर 20 मिनट के लिए रख दें</li>
                                            <li>कद्दूकस की हुई गाजर, धनिया और नमक मिलाएं</li>
                                            <li>भाप देने से ठीक पहले बेकिंग सोडा डालें और हल्के हाथों से मिलाएं</li>
                                            <li>बैटर को इडली के सांचों में डालें और 12-15 मिनट तक भाप दें</li>
                                            <li>गर्मागर्म पालक की चटनी के साथ परोसें</li>
                                        </ol>
                                    </div>
                                </div>
                                
                                <div class="recipe-card">
                                    <h3 class="card-title">स्वास्थ्य लाभ</h3>
                                    <div class="card-content">
                                        <p class="benefits-text" id="benefitsTextHi">ओट्स में घुलनशील फाइबर होता है जो कोलेस्ट्रॉल कम करने में मदद करता है। गाजर आँखों के स्वास्थ्य के लिए बीटा-कैरोटीन प्रदान करती है। यह कम वसा वाला, उच्च फाइबर नाश्ता रक्त शर्करा के स्तर को स्थिर रखने और हृदय स्वास्थ्य का समर्थन करता है।</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="health-info">
                    <h4><i class="fas fa-heart"></i> Health Notes for Adults 40+</h4>
                    <ul>
                        <li>Rich in soluble fiber to support heart health and cholesterol management</li>
                        <li>Low glycemic index helps maintain stable blood sugar levels</li>
                        <li>Provides sustained energy without blood sugar spikes</li>
                        <li>High in antioxidants to combat age-related oxidative stress</li>
                        <li>Supports digestive health with probiotic yogurt</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <footer>
        <p>Made with ❤️ for Healthy Aging | Enjoy nutritious meals for a vibrant life!</p>
    </footer>

    <script>
        // Recipe database with 10 recipes per category (for adults 40+)
        const recipes = {
            breakfast: [
                {
                    name: "Bacon & Egg Poha",
                    image: "img/baconandeggpoha.jpg",
                    ingredients: {
                        en: [
                            "2 cups flattened rice (poha)",
                            "1 onion, finely chopped",
                            "4 strips bacon, chopped",
                            "2 eggs",
                            "1 tsp mustard seeds",
                            "1 tsp turmeric powder",
                            "2 green chilies, chopped",
                            "8-10 curry leaves",
                            "2 tbsp oil",
                            "Salt to taste",
                            "Fresh coriander for garnish",
                            "Lemon wedges for serving"
                        ],
                        hi: [
                            "2 कप चपटे चावल (पोहा)",
                            "1 प्याज, बारीक कटा हुआ",
                            "4 स्ट्रिप बेकन, कटा हुआ",
                            "2 अंडे",
                            "1 चम्मच राई के दाने",
                            "1 चम्मच हल्दी पाउडर",
                            "2 हरी मिर्च, कटी हुई",
                            "8-10 करी पत्ते",
                            "2 बड़े चम्मच तेल",
                            "नमक स्वादानुसार",
                            "ताजा धनिया गार्निश के लिए",
                            "सर्व करने के लिए नींबू के वेज"
                        ]
                    },
                    steps: {
                        en: [
                            "Rinse poha in water until soft. Drain and set aside.",
                            "Cook bacon in a pan until crispy. Remove and set aside.",
                            "In the same pan, add oil. Add mustard seeds and let them splutter.",
                            "Add chopped onions, green chilies, and curry leaves. Sauté until onions turn translucent.",
                            "Push vegetables to side, crack eggs into pan and scramble.",
                            "Add turmeric powder and salt. Mix well.",
                            "Add the soaked poha and cooked bacon. Mix gently. Cook for 3-4 minutes.",
                            "Garnish with fresh coriander and serve hot with lemon wedges."
                        ],
                        hi: [
                            "पोहे को पानी में धोकर नरम होने तक भिगोएं। निकालकर अलग रख दें।",
                            "एक पैन में बेकन को कुरकुरा होने तक पकाएं। निकालकर अलग रख दें।",
                            "उसी पैन में तेल डालें। राई डालें और चटकने दें।",
                            "कटा हुआ प्याज, हरी मिर्च और करी पत्ता डालें। प्याज के पारदर्शी होने तक भूनें।",
                            "सब्जियों को किनारे करें, पैन में अंडे तोड़ें और स्क्रैम्बल करें।",
                            "हल्दी पाउडर और नमक डालें। अच्छी तरह मिलाएं।",
                            "भीगे हुए पोहे और पके हुए बेकन डालें। हल्के हाथों से मिलाएं। 3-4 मिनट तक पकाएं।",
                            "ताजा धनिया से गार्निश करें और नींबू के वेज के साथ गर्म परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Poha is light and easy to digest. Bacon adds protein and flavor while eggs provide essential nutrients. This protein-rich breakfast provides sustained energy throughout the morning.",
                        hi: "पोहा हल्का और पचने में आसान होता है। बेकन प्रोटीन और स्वाद जोड़ता है जबकि अंडे आवश्यक पोषक तत्व प्रदान करते हैं। यह प्रोटीन से भरपूर नाश्ता पूरी सुबह सतत ऊर्जा प्रदान करता है।"
                    }
                },
                {
                    name: "Smoked Salmon Idli",
                    image: "img/smokedsalmonidli.jpg",
                    ingredients: {
                        en: [
                            "2 cups idli batter",
                            "100g smoked salmon, thinly sliced",
                            "1/2 cup cream cheese",
                            "1 tbsp dill, chopped",
                            "1 tsp lemon zest",
                            "1 tbsp capers",
                            "1 red onion, thinly sliced",
                            "Salt to taste"
                        ],
                        hi: [
                            "2 कप इडली बैटर",
                            "100g स्मोक्ड सैल्मन, पतला कटा हुआ",
                            "1/2 कप क्रीम चीज़",
                            "1 बड़ा चम्मच डिल, कटा हुआ",
                            "1 चम्मच नींबू की जेस्ट",
                            "1 बड़ा चम्मच केपर्स",
                            "1 लाल प्याज, पतला कटा हुआ",
                            "नमक स्वादानुसार"
                        ]
                    },
                    steps: {
                        en: [
                            "Prepare idli batter as per instructions and steam idlis.",
                            "In a bowl, mix cream cheese, dill, lemon zest, and capers.",
                            "Spread cream cheese mixture on idlis.",
                            "Top with smoked salmon slices and red onion.",
                            "Garnish with fresh dill and serve immediately."
                        ],
                        hi: [
                            "निर्देशानुसार इडली बैटर तैयार करें और इडली को भाप में पकाएं।",
                            "एक कटोरे में क्रीम चीज़, डिल, नींबू की जेस्ट और केपर्स मिलाएं।",
                            "इडली पर क्रीम चीज़ मिश्रण फैलाएं।",
                            "स्मोक्ड सैल्मन स्लाइस और लाल प्याज के साथ सजाएं।",
                            "ताजा डिल से गार्निश करें और तुरंत परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Idli is a fermented food that's great for gut health. Smoked salmon is rich in omega-3 fatty acids and high-quality protein. This sophisticated breakfast provides essential nutrients for brain health.",
                        hi: "इडली एक किण्वित भोजन है जो आंतों के स्वास्थ्य के लिए बहुत अच्छा है। स्मोक्ड सैल्मन ओमेगा-3 फैटी एसिड और उच्च गुणवत्ता वाले प्रोटीन से भरपूर होता है। यह परिष्कृत नाश्ता मस्तिष्क स्वास्थ्य के लिए आवश्यक पोषक तत्व प्रदान करता है।"
                    }
                },
                {
                    name: "Oats Idli with Spinach Chutney",
                    image: "img/idli.jpg",
                    ingredients: {
                        en: [
                            "1 cup oats (ground into flour)",
                            "1/2 cup semolina (rava)",
                            "1 cup yogurt (low-fat)",
                            "1 carrot, grated",
                            "1/4 cup chopped coriander",
                            "1 tsp mustard seeds",
                            "1 tsp baking soda",
                            "Salt to taste",
                            "Water as needed"
                        ],
                        hi: [
                            "1 कप ओट्स (पीसकर आटा बनाएं)",
                            "1/2 कप सूजी",
                            "1 कप दही (कम वसा वाली)",
                            "1 गाजर, कद्दूकस की हुई",
                            "1/4 कप कटा हुआ धनिया",
                            "1 चम्मच राई के दाने",
                            "1 चम्मच बेकिंग सोडा",
                            "नमक स्वादानुसार",
                            "आवश्यकतानुसार पानी"
                        ]
                    },
                    steps: {
                        en: [
                            "Dry roast oats until aromatic, then grind to flour",
                            "Mix oats flour, semolina, yogurt, and water to make batter",
                            "Cover and rest for 20 minutes",
                            "Add grated carrot, coriander, and salt",
                            "Just before steaming, add baking soda and mix gently",
                            "Pour batter into idli molds and steam for 12-15 minutes",
                            "Serve hot with spinach chutney"
                        ],
                        hi: [
                            "ओट्स को सुखा भूनें और पीसकर आटा बनाएं",
                            "ओट्स का आटा, सूजी, दही और पानी मिलाकर बैटर बनाएं",
                            "ढककर 20 मिनट के लिए रख दें",
                            "कद्दूकस की हुई गाजर, धनिया और नमक मिलाएं",
                            "भाप देने से ठीक पहले बेकिंग सोडा डालें और हल्के हाथों से मिलाएं",
                            "बैटर को इडली के सांचों में डालें और 12-15 मिनट तक भाप दें",
                            "गर्मागर्म पालक की चटनी के साथ परोसें"
                        ]
                    },
                    benefits: {
                        en: "Oats are rich in soluble fiber that helps lower cholesterol. Carrots provide beta-carotene for eye health. This low-fat, high-fiber breakfast helps maintain stable blood sugar levels and supports heart health.",
                        hi: "ओट्स में घुलनशील फाइबर होता है जो कोलेस्ट्रॉल कम करने में मदद करता है। गाजर आँखों के स्वास्थ्य के लिए बीटा-कैरोटीन प्रदान करती है। यह कम वसा वाला, उच्च फाइबर नाश्ता रक्त शर्करा के स्तर को स्थिर रखने और हृदय स्वास्थ्य का समर्थन करता है।"
                    }
                },
                {
                    name: "Moong Dal Cheela with Avocado",
                    image: "img/cheela.jpg",
                    ingredients: {
                        en: [
                            "1 cup moong dal (soaked 4 hours)",
                            "1 inch ginger",
                            "1 green chili",
                            "1/2 tsp turmeric powder",
                            "1/4 cup chopped spinach",
                            "Salt to taste",
                            "1 avocado, sliced",
                            "1 tomato, sliced",
                            "1 tsp oil"
                        ],
                        hi: [
                            "1 कप मूंग दाल (4 घंटे भिगोई हुई)",
                            "1 इंच अदरक",
                            "1 हरी मिर्च",
                            "1/2 चम्मच हल्दी पाउडर",
                            "1/4 कप कटा हुआ पालक",
                            "नमक स्वादानुसार",
                            "1 एवोकाडो, स्लाइस किया हुआ",
                            "1 टमाटर, स्लाइस किया हुआ",
                            "1 चम्मच तेल"
                        ]
                    },
                    steps: {
                        en: [
                            "Grind soaked moong dal with ginger and green chili to smooth batter",
                            "Add turmeric, spinach, and salt to batter",
                            "Heat non-stick pan and spread oil",
                            "Pour a ladle of batter and spread into thin circle",
                            "Cook until golden brown on both sides",
                            "Serve hot topped with avocado and tomato slices"
                        ],
                        hi: [
                            "भीगी हुई मूंग दाल को अदरक और हरी मिर्च के साथ बारीक पीसें",
                            "बैटर में हल्दी, पालक और नमक मिलाएं",
                            "नॉन-स्टिक पैन गर्म करें और तेल फैलाएं",
                            "एक कलछुल बैटर डालें और पतला फैलाएं",
                            "दोनों तरफ सुनहरा होने तक पकाएं",
                            "गर्मागर्म एवोकाडो और टमाटर स्लाइस के साथ परोसें"
                        ]
                    },
                    benefits: {
                        en: "Moong dal provides plant-based protein and fiber. Avocado adds healthy monounsaturated fats that support heart health. This low-carb breakfast helps maintain healthy blood pressure and cholesterol levels.",
                        hi: "मूंग दाल प्लांट-आधारित प्रोटीन और फाइबर प्रदान करती है। एवोकाडो स्वस्थ मोनोअनसैचुरेटेड वसा जोड़ता है जो हृदय स्वास्थ्य का समर्थन करता है। यह कम-कार्ब नाश्ता स्वस्थ रक्तचाप और कोलेस्ट्रॉल के स्तर को बनाए रखने में मदद करता है।"
                    }
                },
                {
                    name: "Ragi Dosa with Coconut Chutney",
                    image: "img/dosa.jpg",
                    ingredients: {
                        en: [
                            "1 cup ragi flour",
                            "1/2 cup rice flour",
                            "1/4 cup urad dal flour",
                            "1/4 tsp fenugreek seeds",
                            "Salt to taste",
                            "Water as needed",
                            "1 tsp oil for cooking"
                        ],
                        hi: [
                            "1 कप रागी का आटा",
                            "1/2 कप चावल का आटा",
                            "1/4 कप उड़द दाल का आटा",
                            "1/4 चम्मच मेथी दाना",
                            "नमक स्वादानुसार",
                            "आवश्यकतानुसार पानी",
                            "पकाने के लिए 1 चम्मच तेल"
                        ]
                    },
                    steps: {
                        en: [
                            "Mix all flours and fenugreek seeds in a bowl",
                            "Add water gradually to make thin batter",
                            "Cover and ferment for 6-8 hours",
                            "Add salt and mix well",
                            "Heat dosa pan and pour ladle of batter",
                            "Spread in circular motion to make thin dosa",
                            "Drizzle oil and cook until crisp",
                            "Serve hot with coconut chutney"
                        ],
                        hi: [
                            "एक कटोरे में सभी आटे और मेथी दाना मिलाएं",
                            "धीरे-धीरे पानी डालकर पतला बैटर बनाएं",
                            "ढककर 6-8 घंटे के लिए किण्वित होने दें",
                            "नमक डालें और अच्छी तरह मिलाएं",
                            "डोसा पैन गर्म करें और बैटर का एक कलछुल डालें",
                            "गोलाकार गति में फैलाकर पतला डोसा बनाएं",
                            "तेल डालें और कुरकुरा होने तक पकाएं",
                            "गर्मागर्म नारियल की चटनी के साथ परोसें"
                        ]
                    },
                    benefits: {
                        en: "Ragi is rich in calcium and iron, supporting bone health and preventing anemia. Its high fiber content aids digestion and helps manage blood sugar levels. This gluten-free breakfast is excellent for maintaining energy throughout the morning.",
                        hi: "रागी कैल्शियम और आयरन से भरपूर होती है, जो हड्डियों के स्वास्थ्य का समर्थन करती है और एनीमिया को रोकती है। इसकी उच्च फाइबर सामग्री पाचन में सहायता करती है और रक्त शर्करा के स्तर को प्रबंधित करने में मदद करती है। यह ग्लूटेन-मुक्त नाश्ता पूरी सुबह ऊर्जा बनाए रखने के लिए उत्कृष्ट है।"
                    }
                },
                {
                    name: "Quinoa Poha with Vegetables",
                    image: "img/poha.jpg",
                    ingredients: {
                        en: [
                            "1 cup quinoa flakes",
                            "1 onion, finely chopped",
                            "1/2 cup mixed vegetables (peas, carrots, beans)",
                            "1 tsp mustard seeds",
                            "1 tsp turmeric powder",
                            "8-10 curry leaves",
                            "2 tbsp roasted peanuts",
                            "1 tbsp oil",
                            "Salt to taste",
                            "Fresh coriander for garnish"
                        ],
                        hi: [
                            "1 कप क्विनोआ फ्लेक्स",
                            "1 प्याज, बारीक कटा हुआ",
                            "1/2 कप मिश्रित सब्जियाँ (मटर, गाजर, बीन्स)",
                            "1 चम्मच राई के दाने",
                            "1 चम्मच हल्दी पाउडर",
                            "8-10 करी पत्ते",
                            "2 बड़े चम्मच भुने मूंगफली",
                            "1 बड़ा चम्मच तेल",
                            "नमक स्वादानुसार",
                            "ताजा धनिया गार्निश के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Rinse quinoa flakes in water and set aside",
                            "Heat oil in a pan, add mustard seeds and curry leaves",
                            "Add onions and sauté until translucent",
                            "Add mixed vegetables and cook for 3-4 minutes",
                            "Add turmeric and salt, mix well",
                            "Add quinoa flakes and roasted peanuts",
                            "Cover and cook on low heat for 5 minutes",
                            "Garnish with fresh coriander and serve"
                        ],
                        hi: [
                            "क्विनोआ फ्लेक्स को पानी में धोकर अलग रख दें",
                            "पैन में तेल गर्म करें, राई और करी पत्ता डालें",
                            "प्याज डालें और पारदर्शी होने तक भूनें",
                            "मिश्रित सब्जियाँ डालें और 3-4 मिनट तक पकाएं",
                            "हल्दी और नमक डालें, अच्छी तरह मिलाएं",
                            "क्विनोआ फ्लेक्स और भुने मूंगफली डालें",
                            "ढककर धीमी आंच पर 5 मिनट तक पकाएं",
                            "ताजा धनिया से गार्निश करें और परोसें"
                        ]
                    },
                    benefits: {
                        en: "Quinoa provides complete protein and all essential amino acids. The vegetables add vitamins, minerals, and fiber. This high-protein, low-glycemic breakfast helps maintain muscle mass and provides sustained energy without blood sugar spikes.",
                        hi: "क्विनोआ संपूर्ण प्रोटीन और सभी आवश्यक अमीनो एसिड प्रदान करता है। सब्जियां विटामिन, खनिज और फाइबर जोड़ती हैं। यह उच्च-प्रोटीन, कम-ग्लाइसेमिक नाश्ता मांसपेशियों को बनाए रखने में मदद करता है और रक्त शर्करा में स्पाइक्स के बिना सतत ऊर्जा प्रदान करता है।"
                    }
                },
                {
                    name: "Broccoli Paratha with Mint Raita",
                    image: "img/paratha.jpg",
                    ingredients: {
                        en: [
                            "2 cups whole wheat flour",
                            "1 cup broccoli, finely grated",
                            "1 onion, finely chopped",
                            "1 tsp ginger-garlic paste",
                            "1 tsp cumin powder",
                            "1/2 tsp turmeric powder",
                            "Salt to taste",
                            "Water as needed",
                            "For raita:",
                            "1 cup yogurt",
                            "1/4 cup mint leaves",
                            "1/4 cup grated cucumber",
                            "Salt to taste"
                        ],
                        hi: [
                            "2 कप गेहूं का आटा",
                            "1 कप ब्रोकोली, बारीक कद्दूकस की हुई",
                            "1 प्याज, बारीक कटा हुआ",
                            "1 चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच जीरा पाउडर",
                            "1/2 चम्मच हल्दी पाउडर",
                            "नमक स्वादानुसार",
                            "आवश्यकतानुसार पानी",
                            "रायता के लिए:",
                            "1 कप दही",
                            "1/4 कप पुदीना पत्तियां",
                            "1/4 कप कद्दूकस ककड़ी",
                            "नमक स्वादानुसार"
                        ]
                    },
                    steps: {
                        en: [
                            "Mix wheat flour, broccoli, onion, ginger-garlic paste, spices, and salt",
                            "Add water gradually to make soft dough",
                            "Divide dough into balls and roll into parathas",
                            "Cook on tawa with minimal oil until golden brown",
                            "For raita: Blend mint with yogurt and mix with cucumber",
                            "Serve hot parathas with mint raita"
                        ],
                        hi: [
                            "गेहूं का आटा, ब्रोकोली, प्याज, अदरक-लहसुन पेस्ट, मसाले और नमक मिलाएं",
                            "धीरे-धीरे पानी डालकर नरम आटा गूंथें",
                            "आटे को गोलों में बांटें और पराठे बेलें",
                            "थोड़े तेल के साथ तवे पर सुनहरा होने तक पकाएं",
                            "रायता के लिए: पुदीने को दही के साथ ब्लेंड करें और ककड़ी के साथ मिलाएं",
                            "गर्म पराठे पुदीना रायते के साथ परोसें"
                        ]
                    },
                    benefits: {
                        en: "Broccoli is rich in antioxidants and fiber, supporting digestive health. Whole wheat provides complex carbohydrates for sustained energy. This high-fiber breakfast helps maintain healthy cholesterol levels and supports immune function.",
                        hi: "ब्रोकोली एंटीऑक्सिडेंट और फाइबर से भरपूर होती है, जो पाचन स्वास्थ्य का समर्थन करती है। गेहूं सतत ऊर्जा के लिए जटिल कार्बोहाइड्रेट प्रदान करता है। यह उच्च-फाइबर नाश्ता स्वस्थ कोलेस्ट्रॉल के स्तर को बनाए रखने और प्रतिरक्षा कार्य का समर्थन करने में मदद करता है।"
                    }
                }
            ],
            lunch: [
                 {
                    name: "Rajma Chawal",
                    image: "img/rajmachawal.jpg",
                    ingredients: {
                        en: [
                            "1 cup rajma (kidney beans), soaked overnight",
                            "2 onions, finely chopped",
                            "3 tomatoes, pureed",
                            "2 green chilies, slit",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp cumin seeds",
                            "1 tsp turmeric powder",
                            "1 tbsp coriander powder",
                            "1 tsp garam masala",
                            "2 tbsp oil",
                            "Salt to taste",
                            "Fresh coriander for garnish",
                            "Cooked rice for serving"
                        ],
                        hi: [
                            "1 कप राजमा, रात भर भिगोया हुआ",
                            "2 प्याज, बारीक कटा हुआ",
                            "3 टमाटर, प्यूरी किया हुआ",
                            "2 हरी मिर्च, चीरा लगा हुआ",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच जीरा",
                            "1 चम्मच हल्दी पाउडर",
                            "1 बड़ा चम्मच धनिया पाउडर",
                            "1 चम्मच गरम मसाला",
                            "2 बड़े चम्मच तेल",
                            "नमक स्वादानुसार",
                            "ताजा धनिया गार्निश के लिए",
                            "पक्के हुए चावल परोसने के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Pressure cook soaked rajma until soft (about 15-20 minutes)",
                            "Heat oil in a pan. Add cumin seeds and let them splutter",
                            "Add chopped onions and sauté until golden brown",
                            "Add ginger-garlic paste and green chilies. Sauté for 2 minutes",
                            "Add tomato puree and cook until oil separates",
                            "Add turmeric, coriander powder, and salt. Cook for 2 minutes",
                            "Add cooked rajma along with its water. Simmer for 10 minutes",
                            "Add garam masala and garnish with fresh coriander",
                            "Serve hot with steamed rice"
                        ],
                        hi: [
                            "भीगे हुए राजमा को नरम होने तक प्रेशर कुक करें (लगभग 15-20 मिनट)",
                            "एक पैन में तेल गर्म करें। जीरा डालें और चटकने दें",
                            "कटा हुआ प्याज डालें और सुनहरा होने तक भूनें",
                            "अदरक-लहसुन पेस्ट और हरी मिर्च डालें। 2 मिनट तक भूनें",
                            "टमाटर प्यूरी डालें और तेल अलग होने तक पकाएं",
                            "हल्दी, धनिया पाउडर और नमक डालें। 2 मिनट तक पकाएं",
                            "पके हुए राजमा को उसके पानी के साथ डालें। 10 मिनट तक उबालें",
                            "गरम मसाला डालें और ताजा धनिया से गार्निश करें",
                            "भाप में पके चावल के साथ गर्म परोसें"
                        ]
                    },
                    benefits: {
                        en: "Rajma is an excellent source of plant-based protein and fiber. It helps in maintaining blood sugar levels and promotes gut health. Combined with rice, it provides a complete protein profile with all essential amino acids.",
                        hi: "राजमा पौधे आधारित प्रोटीन और फाइबर का एक उत्कृष्ट स्रोत है। यह रक्त शर्करा के स्तर को बनाए रखने में मदद करता है और आंतों के स्वास्थ्य को बढ़ावा देता है। चावल के साथ संयुक्त, यह सभी आवश्यक अमीनो एसिड के साथ एक पूर्ण प्रोटीन प्रोफ़ाइल प्रदान करता है।"
                    }
                },
                {
                    name: "Chole Bhature",
                    image: "img/cholebhature.jpg",
                    ingredients: {
                        en: [
                            "1 cup chickpeas (chole), soaked overnight",
                            "2 onions, finely chopped",
                            "2 tomatoes, pureed",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp cumin seeds",
                            "1 tbsp chole masala",
                            "1/2 tsp turmeric powder",
                            "1/2 tsp red chili powder",
                            "2 tbsp oil",
                            "Salt to taste",
                            "For Bhature:",
                            "2 cups all-purpose flour",
                            "1/2 cup yogurt",
                            "1 tsp sugar",
                            "1/2 tsp baking soda",
                            "Salt to taste",
                            "Water as needed",
                            "Oil for frying"
                        ],
                        hi: [
                            "1 कप छोले, रात भर भिगोए हुए",
                            "2 प्याज, बारीक कटा हुआ",
                            "2 टमाटर, प्यूरी किया हुआ",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच जीरा",
                            "1 बड़ा चम्मच छोले मसाला",
                            "1/2 चम्मच हल्दी पाउडर",
                            "1/2 चम्मच लाल मिर्च पाउडर",
                            "2 बड़े चम्मच तेल",
                            "नमक स्वादानुसार",
                            "भठूरे के लिए:",
                            "2 कप मैदा",
                            "1/2 कप दही",
                            "1 चम्मच चीनी",
                            "1/2 चम्मच बेकिंग सोडा",
                            "नमक स्वादानुसार",
                            "आवश्यकतानुसार पानी",
                            "तलने के लिए तेल"
                        ]
                    },
                    steps: {
                        en: [
                            "Pressure cook chickpeas until soft. Drain and set aside.",
                            "Heat oil in a pan. Add cumin seeds and let them splutter.",
                            "Add onions and sauté until golden brown.",
                            "Add ginger-garlic paste and sauté for 2 minutes.",
                            "Add tomato puree and cook until oil separates.",
                            "Add spices and cooked chickpeas. Simmer for 10 minutes.",
                            "For bhature: Mix flour, yogurt, sugar, baking soda and salt.",
                            "Add water and knead into a soft dough. Cover and rest for 2 hours.",
                            "Divide dough into balls, roll into circles and deep fry until puffed and golden.",
                            "Serve hot chole with bhature and onion slices."
                        ],
                        hi: [
                            "छोले को नरम होने तक प्रेशर कुक करें। निथार कर अलग रख दें।",
                            "पैन में तेल गर्म करें। जीरा डालें और चटकने दें।",
                            "प्याज डालें और सुनहरा होने तक भूनें।",
                            "अदरक-लहसुन पेस्ट डालें और 2 मिनट तक भूनें।",
                            "टमाटर प्यूरी डालें और तेल अलग होने तक पकाएं।",
                            "मसाले और पके हुए छोले डालें। 10 मिनट तक उबालें।",
                            "भठूरे के लिए: मैदा, दही, चीनी, बेकिंग सोडा और नमक मिलाएं।",
                            "पानी डालकर नरम आटा गूंथ लें। ढककर 2 घंटे रख दें।",
                            "आटे को गोलों में बांटें, गोल बेलें और फूलकर सुनहरा होने तक तलें।",
                            "गर्म छोले को भठूरे और प्याज के स्लाइस के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Chickpeas are rich in protein and fiber, essential for muscle growth and digestion. The combination with bhature provides a balanced meal with carbohydrates for energy. This popular North Indian dish is both nutritious and satisfying.",
                        hi: "छोले प्रोटीन और फाइबर से भरपूर होते हैं, जो मांसपेशियों के विकास और पाचन के लिए आवश्यक हैं। भठूरे के साथ संयोजन ऊर्जा के लिए कार्बोहाइड्रेट के साथ एक संतुलित भोजन प्रदान करता है। यह लोकप्रिय उत्तर भारतीय व्यंजन पौष्टिक और संतोषजनक दोनों है।"
                    }
                },
                {
                    name: "Vegetable Pulao",
                    image: "img/vegetablepulao.jpg",
                    ingredients: {
                        en: [
                            "1 cup basmati rice, soaked for 30 minutes",
                            "1 cup mixed vegetables (carrots, peas, beans, cauliflower)",
                            "1 onion, sliced",
                            "1 tomato, chopped",
                            "2 green chilies, slit",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp cumin seeds",
                            "2 cloves",
                            "1-inch cinnamon stick",
                            "2 cardamom pods",
                            "1/2 cup mint leaves",
                            "2 tbsp oil or ghee",
                            "Salt to taste",
                            "2 cups water"
                        ],
                        hi: [
                            "1 कप बासमती चावल, 30 मिनट के लिए भिगोएँ",
                            "1 कप मिश्रित सब्जियां (गाजर, मटर, बीन्स, फूलगोभी)",
                            "1 प्याज, कटा हुआ",
                            "1 टमाटर, कटा हुआ",
                            "2 हरी मिर्च, चीरा लगा हुआ",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच जीरा",
                            "2 लौंग",
                            "1 इंच दालचीनी का टुकड़ा",
                            "2 इलायची",
                            "1/2 कप पुदीना पत्तियां",
                            "2 बड़े चम्मच तेल या घी",
                            "नमक स्वादानुसार",
                            "2 कप पानी"
                        ]
                    },
                    steps: {
                        en: [
                            "Heat oil/ghee in a pressure cooker. Add whole spices and cumin seeds. Sauté until fragrant",
                            "Add sliced onions and sauté until golden brown",
                            "Add ginger-garlic paste and green chilies. Sauté for 2 minutes",
                            "Add tomatoes and cook until soft",
                            "Add mixed vegetables and sauté for 3-4 minutes",
                            "Drain soaked rice and add to the cooker. Gently mix",
                            "Add water, salt, and mint leaves. Stir well",
                            "Close the lid and cook for 2 whistles on medium flame",
                            "Let pressure release naturally. Fluff the rice with a fork",
                            "Serve hot with raita or curry"
                        ],
                        hi: [
                            "प्रेशर कुकर में तेल/घी गर्म करें। साबुत मसाले और जीरा डालें। सुगंध आने तक भूनें",
                            "कटा हुआ प्याज डालें और सुनहरा होने तक भूनें",
                            "अदरक-लहसुन पेस्ट और हरी मिर्च डालें। 2 मिनट तक भूनें",
                            "टमाटर डालें और नरम होने तक पकाएं",
                            "मिश्रित सब्जियां डालें और 3-4 मिनट तक भूनें",
                            "भीगे हुए चावल को निकालें और कुकर में डालें। हल्के हाथ से मिलाएं",
                            "पानी, नमक और पुदीना पत्तियां डालें। अच्छी तरह हिलाएं",
                            "ढक्कन बंद करें और मध्यम आंच पर 2 सीटी आने तक पकाएं",
                            "प्रेशर अपने आप रिलीज होने दें। कांटे से चावल को फ्लफ करें",
                            "रायता या करी के साथ गर्म परोसें"
                        ]
                    },
                    benefits: {
                        en: "Vegetable pulao is a balanced meal with carbohydrates from rice, fiber and vitamins from vegetables, and protein from peas. The spices aid digestion and boost metabolism. It's a light yet nutritious dinner option.",
                        hi: "वेजिटेबल पुलाव चावल से कार्बोहाइड्रेट, सब्जियों से फाइबर और विटामिन, और मटर से प्रोटीन के साथ एक संतुलित भोजन है। मसाले पाचन में सहायता करते हैं और चयापचय को बढ़ावा देते हैं। यह एक हल्का लेकिन पौष्टिक डिनर विकल्प है।"
                    }
                },
                {
                    name: "Brown Rice Khichdi with Vegetables",
                    image: "img/vegetablekhichdi.jpg",
                    ingredients: {
                        en: [
                            "1 cup brown rice",
                            "1/2 cup moong dal",
                            "1 onion, chopped",
                            "1 tomato, chopped",
                            "1/2 cup mixed vegetables",
                            "1 tsp cumin seeds",
                            "1 tsp turmeric powder",
                            "1 tsp ghee",
                            "Salt to taste",
                            "4 cups water"
                        ],
                        hi: [
                            "1 कप ब्राउन राइस",
                            "1/2 कप मूंग दाल",
                            "1 प्याज, कटा हुआ",
                            "1 टमाटर, कटा हुआ",
                            "1/2 कप मिश्रित सब्जियाँ",
                            "1 चम्मच जीरा",
                            "1 चम्मच हल्दी पाउडर",
                            "1 चम्मच घी",
                            "नमक स्वादानुसार",
                            "4 कप पानी"
                        ]
                    },
                    steps: {
                        en: [
                            "Wash brown rice and moong dal together",
                            "Heat ghee in pressure cooker, add cumin seeds",
                            "Add onions and sauté until golden",
                            "Add tomatoes and cook until soft",
                            "Add mixed vegetables, rice-dal mix, turmeric and salt",
                            "Add water and pressure cook for 4-5 whistles",
                            "Let pressure release naturally",
                            "Serve hot with yogurt"
                        ],
                        hi: [
                            "ब्राउन राइस और मूंग दाल एक साथ धोएं",
                            "प्रेशर कुकर में घी गर्म करें, जीरा डालें",
                            "प्याज डालें और सुनहरा होने तक भूनें",
                            "टमाटर डालें और नरम होने तक पकाएं",
                            "मिश्रित सब्जियाँ, चावल-दाल मिश्रण, हल्दी और नमक डालें",
                            "पानी डालें और 4-5 सीटी आने तक प्रेशर कुक करें",
                            "दबाव स्वाभाविक रूप से निकलने दें",
                            "गर्मागर्म दही के साथ परोसें"
                        ]
                    },
                    benefits: {
                        en: "Brown rice provides complex carbs and fiber for sustained energy. Moong dal adds plant-based protein. This balanced meal supports digestive health and provides essential nutrients without spiking blood sugar.",
                        hi: "ब्राउन राइस सतत ऊर्जा के लिए जटिल कार्ब्स और फाइबर प्रदान करता है। मूंग दाल प्लांट-आधारित प्रोटीन जोड़ती है। यह संतुलित भोजन पाचन स्वास्थ्य का समर्थन करता है और रक्त शर्करा को बढ़ाए बिना आवश्यक पोषक तत्व प्रदान करता है।"
                    }
                },
                {
                    name: "Quinoa Pulao with Tofu",
                    image: "img/quinao.jpg",
                    ingredients: {
                        en: [
                            "1 cup quinoa",
                            "100g tofu, cubed",
                            "1 onion, sliced",
                            "1 bell pepper, sliced",
                            "1/2 cup green peas",
                            "1 tsp ginger-garlic paste",
                            "1 tsp garam masala",
                            "2 cups vegetable broth",
                            "1 tbsp oil",
                            "Salt to taste"
                        ],
                        hi: [
                            "1 कप क्विनोआ",
                            "100g टोफू, क्यूब्स में कटा हुआ",
                            "1 प्याज, कटा हुआ",
                            "1 शिमला मिर्च, कटा हुआ",
                            "1/2 कप हरी मटर",
                            "1 चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच गरम मसाला",
                            "2 कप सब्जी शोरबा",
                            "1 बड़ा चम्मच तेल",
                            "नमक स्वादानुसार"
                        ]
                    },
                    steps: {
                        en: [
                            "Rinse quinoa thoroughly and drain",
                            "Heat oil in a pan, add tofu and sauté until golden",
                            "Add onions and sauté until translucent",
                            "Add ginger-garlic paste and cook for 1 minute",
                            "Add bell pepper and peas, cook for 3-4 minutes",
                            "Add quinoa, garam masala, and salt",
                            "Pour vegetable broth and bring to boil",
                            "Cover and simmer for 15 minutes",
                            "Fluff with fork and serve hot"
                        ],
                        hi: [
                            "क्विनोआ को अच्छी तरह धोकर निथार लें",
                            "पैन में तेल गर्म करें, टोफू डालें और सुनहरा होने तक भूनें",
                            "प्याज डालें और पारदर्शी होने तक भूनें",
                            "अदरक-लहसुन पेस्ट डालें और 1 मिनट तक पकाएं",
                            "शिमला मिर्च और मटर डालें, 3-4 मिनट तक पकाएं",
                            "क्विनोआ, गरम मसाला और नमक डालें",
                            "सब्जी शोरबा डालें और उबाल लें",
                            "ढककर 15 मिनट तक उबालें",
                            "कांटे से फुलाएं और गर्मागर्म परोसें"
                        ]
                    },
                    benefits: {
                        en: "Quinoa is a complete protein source with all essential amino acids. Tofu adds plant-based protein and isoflavones. This high-fiber, low-glycemic meal supports heart health and helps maintain stable blood sugar levels.",
                        hi: "क्विनोआ सभी आवश्यक अमीनो एसिड के साथ एक संपूर्ण प्रोटीन स्रोत है। टोफू प्लांट-आधारित प्रोटीन और आइसोफ्लेवोन्स जोड़ता है। यह उच्च-फाइबर, कम-ग्लाइसेमिक भोजन हृदय स्वास्थ्य का समर्थन करता है और स्थिर रक्त शर्करा के स्तर को बनाए रखने में मदद करता है।"
                    }
                },
                {
                    name: "Millet Dosa with Sambar",
                    image: "img/dosa.jpg",
                    ingredients: {
                        en: [
                            "1 cup foxtail millet",
                            "1/2 cup urad dal",
                            "1/4 tsp fenugreek seeds",
                            "Salt to taste",
                            "Water as needed",
                            "For sambar:",
                            "1/2 cup toor dal",
                            "1 cup mixed vegetables",
                            "1 tsp sambar powder",
                            "1/2 tsp turmeric",
                            "Tamarind pulp",
                            "Salt to taste"
                        ],
                        hi: [
                            "1 कप कंगनी बाजरा",
                            "1/2 कप उड़द दाल",
                            "1/4 चम्मच मेथी दाना",
                            "नमक स्वादानुसार",
                            "आवश्यकतानुसार पानी",
                            "सांभर के लिए:",
                            "1/2 कप तूर दाल",
                            "1 कप मिश्रित सब्जियाँ",
                            "1 चम्मच सांभर पाउडर",
                            "1/2 चम्मच हल्दी",
                            "इमली का पल्प",
                            "नमक स्वादानुसार"
                        ]
                    },
                    steps: {
                        en: [
                            "Soak millet, urad dal and fenugreek for 6 hours",
                            "Grind to smooth batter and ferment overnight",
                            "Add salt and mix well",
                            "Make thin dosas on hot tawa",
                            "For sambar: Cook dal and vegetables with turmeric",
                            "Add sambar powder, tamarind pulp and salt",
                            "Simmer for 10 minutes",
                            "Serve hot dosas with sambar"
                        ],
                        hi: [
                            "बाजरा, उड़द दाल और मेथी 6 घंटे के लिए भिगोएँ",
                            "बारीक पीसकर बैटर बनाएं और रात भर किण्वित होने दें",
                            "नमक डालें और अच्छी तरह मिलाएं",
                            "गरम तवे पर पतले डोसे बनाएं",
                            "सांभर के लिए: दाल और सब्जियों को हल्दी के साथ पकाएं",
                            "सांभर पाउडर, इमली का पल्प और नमक डालें",
                            "10 मिनट तक उबालें",
                            "गर्म डोसे सांभर के साथ परोसें"
                        ]
                    },
                    benefits: {
                        en: "Millets are rich in fiber, magnesium, and antioxidants. This gluten-free meal supports heart health and helps manage blood sugar. The combination provides complete protein and supports digestive health.",
                        hi: "बाजरा फाइबर, मैग्नीशियम और एंटीऑक्सिडेंट से भरपूर होता है। यह ग्लूटेन-मुक्त भोजन हृदय स्वास्थ्य का समर्थन करता है और रक्त शर्करा को प्रबंधित करने में मदद करता है। संयोजन संपूर्ण प्रोटीन प्रदान करता है और पाचन स्वास्थ्य का समर्थन करता है।"
                    }
                },
                {
                    name: "Spinach Dal with Brown Rice",
                    image: "img/dal.jpg",
                    ingredients: {
                        en: [
                            "1 cup toor dal",
                            "2 cups spinach, chopped",
                            "1 onion, chopped",
                            "2 tomatoes, chopped",
                            "1 tsp mustard seeds",
                            "1 tsp cumin seeds",
                            "2 dry red chilies",
                            "1/2 tsp turmeric",
                            "1 tbsp oil",
                            "Salt to taste"
                        ],
                        hi: [
                            "1 कप तूर दाल",
                            "2 कप पालक, कटा हुआ",
                            "1 प्याज, कटा हुआ",
                            "2 टमाटर, कटा हुआ",
                            "1 चम्मच राई के दाने",
                            "1 चम्मच जीरा",
                            "2 सूखी लाल मिर्च",
                            "1/2 चम्मच हल्दी",
                            "1 बड़ा चम्मच तेल",
                            "नमक स्वादानुसार"
                        ]
                    },
                    steps: {
                        en: [
                            "Pressure cook dal until soft",
                            "Heat oil, add mustard, cumin and red chilies",
                            "Add onions and sauté until golden",
                            "Add tomatoes and cook until soft",
                            "Add spinach and cook until wilted",
                            "Add cooked dal, turmeric and salt",
                            "Simmer for 10 minutes",
                            "Serve hot with brown rice"
                        ],
                        hi: [
                            "दाल को नरम होने तक प्रेशर कुक करें",
                            "तेल गर्म करें, राई, जीरा और लाल मिर्च डालें",
                            "प्याज डालें और सुनहरा होने तक भूनें",
                            "टमाटर डालें और नरम होने तक पकाएं",
                            "पालक डालें और मुरझाने तक पकाएं",
                            "पकी हुई दाल, हल्दी और नमक डालें",
                            "10 मिनट तक उबालें",
                            "गर्मागर्म ब्राउन राइस के साथ परोसें"
                        ]
                    },
                    benefits: {
                        en: "Spinach is rich in iron, calcium, and vitamins A, C, K. Toor dal provides plant-based protein and fiber. This combination supports bone health, improves digestion, and helps maintain healthy blood pressure.",
                        hi: "पालक आयरन, कैल्शियम और विटामिन ए, सी, के से भरपूर होता है। तूर दाल प्लांट-आधारित प्रोटीन और फाइबर प्रदान करती है। यह संयोजन हड्डियों के स्वास्थ्य का समर्थन करता है, पाचन में सुधार करता है और स्वस्थ रक्तचाप बनाए रखने में मदद करता है।"
                    }
                },
                {
                    name: "Barley Roti with Mixed Vegetable Sabzi",
                    image: "img/roti.jpg",
                    ingredients: {
                        en: [
                            "1 cup barley flour",
                            "1 cup whole wheat flour",
                            "Water as needed",
                            "Salt to taste",
                            "For sabzi:",
                            "2 cups mixed vegetables",
                            "1 onion, chopped",
                            "1 tsp cumin seeds",
                            "1 tsp coriander powder",
                            "1/2 tsp turmeric",
                            "1 tbsp oil"
                        ],
                        hi: [
                            "1 कप जौ का आटा",
                            "1 कप गेहूं का आटा",
                            "आवश्यकतानुसार पानी",
                            "नमक स्वादानुसार",
                            "सब्जी के लिए:",
                            "2 कप मिश्रित सब्जियाँ",
                            "1 प्याज, कटा हुआ",
                            "1 चम्मच जीरा",
                            "1 चम्मच धनिया पाउडर",
                            "1/2 चम्मच हल्दी",
                            "1 बड़ा चम्मच तेल"
                        ]
                    },
                    steps: {
                        en: [
                            "Mix flours and salt, add water to make dough",
                            "Divide into balls and roll into rotis",
                            "Cook on tawa with minimal oil",
                            "For sabzi: Heat oil, add cumin seeds",
                            "Add onions and sauté until golden",
                            "Add vegetables and spices",
                            "Cover and cook until vegetables are tender",
                            "Serve hot rotis with sabzi"
                        ],
                        hi: [
                            "आटे और नमक को मिलाएं, पानी डालकर आटा गूंथें",
                            "गोलों में बांटें और रोटियाँ बेलें",
                            "थोड़े तेल के साथ तवे पर पकाएं",
                            "सब्जी के लिए: तेल गर्म करें, जीरा डालें",
                            "प्याज डालें और सुनहरा होने तक भूनें",
                            "सब्जियाँ और मसाले डालें",
                            "ढककर सब्जियाँ नरम होने तक पकाएं",
                            "गर्म रोटियाँ सब्जी के साथ परोसें"
                        ]
                    },
                    benefits: {
                        en: "Barley is rich in soluble fiber that helps lower cholesterol and regulate blood sugar. The mixed vegetables provide essential vitamins and minerals. This high-fiber meal supports heart health and digestive function.",
                        hi: "जौ घुलनशील फाइबर से भरपूर होता है जो कोलेस्ट्रॉल को कम करने और रक्त शर्करा को नियंत्रित करने में मदद करता है। मिश्रित सब्जियां आवश्यक विटामिन और खनिज प्रदान करती हैं। यह उच्च-फाइबर भोजन हृदय स्वास्थ्य और पाचन कार्य का समर्थन करता है।"
                    }
                }
            ],
            snacks: [
                {
                    name: "Vegetable Samosa",
                    image: "img/vegetablesamosa.jpg",
                    ingredients: {
                        en: [
                            "For dough:",
                            "2 cups all-purpose flour",
                            "4 tbsp oil",
                            "Salt to taste",
                            "Water as needed",
                            "For filling:",
                            "3 potatoes, boiled and mashed",
                            "1/2 cup peas",
                            "1 onion, finely chopped",
                            "1 tsp ginger-garlic paste",
                            "1 tsp cumin seeds",
                            "1 tsp coriander powder",
                            "1/2 tsp garam masala",
                            "1/2 tsp amchur powder",
                            "Oil for frying"
                        ],
                        hi: [
                            "आटे के लिए:",
                            "2 कप मैदा",
                            "4 बड़े चम्मच तेल",
                            "नमक स्वादानुसार",
                            "आवश्यकतानुसार पानी",
                            "भरावन के लिए:",
                            "3 आलू, उबले और मैश किए हुए",
                            "1/2 कप मटर",
                            "1 प्याज, बारीक कटा हुआ",
                            "1 चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच जीरा",
                            "1 चम्मच धनिया पाउडर",
                            "1/2 चम्मच गरम मसाला",
                            "1/2 चम्मच आमचूर पाउडर",
                            "तलने के लिए तेल"
                        ]
                    },
                    steps: {
                        en: [
                            "Mix flour, salt and oil. Add water to make stiff dough. Rest for 30 minutes.",
                            "Heat oil in a pan. Add cumin seeds and onions. Sauté until golden.",
                            "Add ginger-garlic paste, peas and mashed potatoes. Cook for 5 minutes.",
                            "Add spices and mix well. Let filling cool.",
                            "Divide dough into balls. Roll into circles and cut in half.",
                            "Form cones and fill with potato mixture. Seal edges.",
                            "Deep fry until golden brown and crisp.",
                            "Serve hot with mint chutney."
                        ],
                        hi: [
                            "मैदा, नमक और तेल मिलाएं। पानी डालकर कड़ा आटा गूंथ लें। 30 मिनट रख दें।",
                            "पैन में तेल गर्म करें। जीरा और प्याज डालें। सुनहरा होने तक भूनें।",
                            "अदरक-लहसुन पेस्ट, मटर और मैश किए हुए आलू डालें। 5 मिनट तक पकाएं।",
                            "मसाले डालें और अच्छी तरह मिलाएं। भरावन को ठंडा होने दें।",
                            "आटे को गोलों में बांटें। गोल बेलें और आधा काटें।",
                            "कोन बनाएं और आलू के मिश्रण से भरें। किनारों को सील करें।",
                            "सुनहरा भूरा और कुरकुरा होने तक डीप फ्राई करें।",
                            "गर्मागर्म पुदीने की चटनी के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Samosas provide carbohydrates from the crust and protein from peas. Potatoes add potassium and vitamin C. This crispy snack is satisfying and provides instant energy for teens.",
                        hi: "समोसे क्रस्ट से कार्बोहाइड्रेट और मटर से प्रोटीन प्रदान करते हैं। आलू पोटेशियम और विटामिन सी जोड़ते हैं। यह कुरकुरा स्नैक किशोरों के लिए तत्काल ऊर्जा प्रदान करने वाला और संतोषजनक है।"
                    }
                },
                {
                    name: "Paneer Pakora",
                    image: "img/paneerpakora.jpg",
                    ingredients: {
                        en: [
                            "200g paneer, cut into cubes",
                            "1 cup besan (gram flour)",
                            "1/4 cup rice flour",
                            "1 tsp red chili powder",
                            "1/2 tsp turmeric powder",
                            "1 tsp ajwain (carom seeds)",
                            "1/4 tsp baking soda",
                            "Water as needed",
                            "Oil for frying",
                            "Salt to taste"
                        ],
                        hi: [
                            "200g पनीर, क्यूब्स में कटा हुआ",
                            "1 कप बेसन",
                            "1/4 कप चावल का आटा",
                            "1 चम्मच लाल मिर्च पाउडर",
                            "1/2 चम्मच हल्दी पाउडर",
                            "1 चम्मच अजवाइन",
                            "1/4 चम्मच बेकिंग सोडा",
                            "आवश्यकतानुसार पानी",
                            "तलने के लिए तेल",
                            "नमक स्वादानुसार"
                        ]
                    },
                    steps: {
                        en: [
                            "In a bowl, mix besan, rice flour, spices, baking soda and salt.",
                            "Add water gradually to make a thick batter.",
                            "Heat oil in a deep pan.",
                            "Dip paneer cubes in batter and deep fry until golden brown.",
                            "Drain on paper towels.",
                            "Serve hot with mint chutney."
                        ],
                        hi: [
                            "एक कटोरे में बेसन, चावल का आटा, मसाले, बेकिंग सोडा और नमक मिलाएं।",
                            "धीरे-धीरे पानी डालकर गाढ़ा घोल बना लें।",
                            "एक गहरे पैन में तेल गर्म करें।",
                            "पनीर के क्यूब्स को घोल में डुबोएं और सुनहरा भूरा होने तक डीप फ्राई करें।",
                            "पेपर टॉवल पर निकालें।",
                            "गर्मागर्म पुदीने की चटनी के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Paneer pakoras are rich in protein from paneer, essential for muscle development. Gram flour adds fiber. This crispy snack provides calcium for bone health and satisfies hunger effectively.",
                        hi: "पनीर पकोड़े पनीर से प्रोटीन से भरपूर होते हैं, जो मांसपेशियों के विकास के लिए आवश्यक है। बेसन फाइबर जोड़ता है। यह कुरकुरा स्नैक हड्डियों के स्वास्थ्य के लिए कैल्शियम प्रदान करता है और भूख को प्रभावी ढंग से संतुष्ट करता है।"
                    }
                },
                {
                    name: "Bhel Puri",
                    image: "img/bhelpuri.jpg",
                    ingredients: {
                        en: [
                            "2 cups puffed rice",
                            "1/2 cup sev",
                            "1 onion, finely chopped",
                            "1 tomato, finely chopped",
                            "1 boiled potato, diced",
                            "1/4 cup chopped coriander",
                            "2 tbsp tamarind chutney",
                            "2 tbsp green chutney",
                            "1 tsp chaat masala",
                            "1/2 tsp red chili powder",
                            "Lemon juice to taste"
                        ],
                        hi: [
                            "2 कप मुरमुरे",
                            "1/2 कप सेव",
                            "1 प्याज, बारीक कटा हुआ",
                            "1 टमाटर, बारीक कटा हुआ",
                            "1 उबला आलू, कटा हुआ",
                            "1/4 कप कटा हुआ धनिया",
                            "2 बड़े चम्मच इमली की चटनी",
                            "2 बड़े चम्मच हरी चटनी",
                            "1 चम्मच चाट मसाला",
                            "1/2 चम्मच लाल मिर्च पाउडर",
                            "स्वादानुसार नींबू का रस"
                        ]
                    },
                    steps: {
                        en: [
                            "In a large bowl, mix puffed rice, sev, onion, tomato, potato and coriander.",
                            "Add tamarind chutney, green chutney, chaat masala, red chili powder and lemon juice.",
                            "Toss gently to combine.",
                            "Serve immediately before it gets soggy."
                        ],
                        hi: [
                            "एक बड़े कटोरे में मुरमुरे, सेव, प्याज, टमाटर, आलू और धनिया मिलाएं।",
                            "इमली की चटनी, हरी चटनी, चाट मसाला, लाल मिर्च पाउडर और नींबू का रस डालें।",
                            "हल्के से टॉस करके मिलाएं।",
                            "गीला होने से पहले तुरंत परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Bhel puri is a light and tangy snack. Puffed rice provides carbohydrates while vegetables add vitamins and minerals. This low-calorie snack is great for satisfying hunger without adding extra calories.",
                        hi: "भेल पूरी एक हल्का और तीखा स्नैक है। मुरमुरे कार्बोहाइड्रेट प्रदान करते हैं जबकि सब्जियां विटामिन और खनिज जोड़ती हैं। यह कम कैलोरी वाला स्नैक अतिरिक्त कैलोरी जोड़े बिना भूख को संतुष्ट करने के लिए बहुत अच्छा है।"
                    }
                },
                {
                    name: "Sprouts Chaat",
                    image: "img/chaat.jpg",
                    ingredients: {
                        en: [
                            "2 cups mixed sprouts",
                            "1 onion, finely chopped",
                            "1 tomato, finely chopped",
                            "1 green chili, finely chopped",
                            "2 tbsp coriander leaves",
                            "1 lemon, juiced",
                            "1 tsp chaat masala",
                            "1/2 tsp roasted cumin powder",
                            "Salt to taste"
                        ],
                        hi: [
                            "2 कप मिश्रित अंकुरित अनाज",
                            "1 प्याज, बारीक कटा हुआ",
                            "1 टमाटर, बारीक कटा हुआ",
                            "1 हरी मिर्च, बारीक कटी हुई",
                            "2 बड़े चम्मच धनिया पत्ती",
                            "1 नींबू, रस निकाला हुआ",
                            "1 चम्मच चाट मसाला",
                            "1/2 चम्मच भुना जीरा पाउडर",
                            "नमक स्वादानुसार"
                        ]
                    },
                    steps: {
                        en: [
                            "Steam sprouts for 5 minutes and cool",
                            "In a bowl, mix sprouts, onion, tomato, green chili",
                            "Add lemon juice, chaat masala, cumin powder and salt",
                            "Toss gently to combine",
                            "Garnish with coriander leaves",
                            "Serve immediately"
                        ],
                        hi: [
                            "अंकुरित अनाज को 5 मिनट के लिए भाप दें और ठंडा करें",
                            "एक कटोरे में अंकुरित अनाज, प्याज, टमाटर, हरी मिर्च मिलाएं",
                            "नींबू का रस, चाट मसाला, जीरा पाउडर और नमक डालें",
                            "हल्के हाथों से मिलाएं",
                            "धनिया पत्ती से गार्निश करें",
                            "तुरंत परोसें"
                        ]
                    },
                    benefits: {
                        en: "Sprouts are rich in enzymes, vitamins, and minerals. This low-calorie snack provides high-quality protein and fiber. It supports digestion, boosts immunity, and helps maintain healthy weight.",
                        hi: "अंकुरित अनाज एंजाइम, विटामिन और खनिजों से भरपूर होते हैं। यह कम-कैलोरी स्नैक उच्च गुणवत्ता वाला प्रोटीन और फाइबर प्रदान करता है। यह पाचन का समर्थन करता है, प्रतिरक्षा को बढ़ाता है और स्वस्थ वजन बनाए रखने में मदद करता है।"
                    }
                },
                {
                    name: "Baked Sweet Potato Chips",
                    image: "img/chips.jpg",
                    ingredients: {
                        en: [
                            "2 large sweet potatoes",
                            "1 tbsp olive oil",
                            "1 tsp paprika",
                            "1/2 tsp garlic powder",
                            "Salt to taste"
                        ],
                        hi: [
                            "2 बड़े शकरकंद",
                            "1 बड़ा चम्मच ऑलिव ऑयल",
                            "1 चम्मच पपरिका",
                            "1/2 चम्मच लहसुन पाउडर",
                            "नमक स्वादानुसार"
                        ]
                    },
                    steps: {
                        en: [
                            "Preheat oven to 200°C (400°F)",
                            "Wash and slice sweet potatoes thinly",
                            "In a bowl, toss slices with olive oil and spices",
                            "Arrange in single layer on baking sheet",
                            "Bake for 20-25 minutes, flipping halfway",
                            "Cool completely before serving"
                        ],
                        hi: [
                            "ओवन को 200°C (400°F) पर प्रीहीट करें",
                            "शकरकंद धोकर पतले स्लाइस करें",
                            "एक कटोरे में स्लाइस को ऑलिव ऑयल और मसालों के साथ टॉस करें",
                            "बेकिंग शीट पर एक परत में व्यवस्थित करें",
                            "आधा समय बाद पलटते हुए 20-25 मिनट तक बेक करें",
                            "परोसने से पहले पूरी तरह ठंडा करें"
                        ]
                    },
                    benefits: {
                        en: "Sweet potatoes are rich in beta-carotene, fiber, and vitamins. Baking instead of frying reduces fat content. This snack supports eye health, provides antioxidants, and helps regulate blood sugar.",
                        hi: "शकरकंद बीटा-कैरोटीन, फाइबर और विटामिन से भरपूर होते हैं। तलने के बजाय बेकिंग करने से वसा की मात्रा कम हो जाती है। यह स्नैक आंखों के स्वास्थ्य का समर्थन करता है, एंटीऑक्सिडेंट प्रदान करता है और रक्त शर्करा को नियंत्रित करने में मदद करता है।"
                    }
                },
                {
                    name: "Cucumber Raita with Flax Seeds",
                    image: "img/raita.jpg",
                    ingredients: {
                        en: [
                            "2 cups yogurt (low-fat)",
                            "1 cucumber, grated",
                            "1 tbsp roasted flax seeds",
                            "1/4 tsp roasted cumin powder",
                            "Salt to taste",
                            "Fresh mint leaves for garnish"
                        ],
                        hi: [
                            "2 कप दही (कम वसा वाली)",
                            "1 ककड़ी, कद्दूकस की हुई",
                            "1 बड़ा चम्मच भुने अलसी के बीज",
                            "1/4 चम्मच भुना जीरा पाउडर",
                            "नमक स्वादानुसार",
                            "गार्निश के लिए ताजा पुदीना पत्तियां"
                        ]
                    },
                    steps: {
                        en: [
                            "Whisk yogurt until smooth",
                            "Squeeze excess water from grated cucumber",
                            "Mix cucumber with yogurt",
                            "Add salt and cumin powder",
                            "Chill for 30 minutes",
                            "Before serving, sprinkle flax seeds and garnish with mint"
                        ],
                        hi: [
                            "दही को चिकना होने तक फेंटें",
                            "कद्दूकस की हुई ककड़ी से अतिरिक्त पानी निचोड़ें",
                            "ककड़ी को दही के साथ मिलाएं",
                            "नमक और जीरा पाउडर डालें",
                            "30 मिनट के लिए ठंडा करें",
                            "परोसने से पहले, अलसी के बीज छिड़कें और पुदीना से गार्निश करें"
                        ]
                    },
                    benefits: {
                        en: "Yogurt provides probiotics for gut health. Cucumber adds hydration and fiber. Flax seeds are rich in omega-3 fatty acids that support heart health. This cooling snack aids digestion and provides essential nutrients.",
                        hi: "दही आंतों के स्वास्थ्य के लिए प्रोबायोटिक्स प्रदान करती है। ककड़ी हाइड्रेशन और फाइबर जोड़ती है। अलसी के बीज ओमेगा-3 फैटी एसिड से भरपूर होते हैं जो हृदय स्वास्थ्य का समर्थन करते हैं। यह ठंडा स्नैक पाचन में सहायता करता है और आवश्यक पोषक तत्व प्रदान करता है।"
                    }
                },
                {
                    name: "Roasted Chana with Masala",
                    image: "img/chana.jpg",
                    ingredients: {
                        en: [
                            "2 cups black chana (soaked overnight)",
                            "1 tsp oil",
                            "1 tsp chaat masala",
                            "1/2 tsp amchur powder",
                            "1/4 tsp black salt",
                            "1/4 tsp chili powder"
                        ],
                        hi: [
                            "2 कप काले चने (रात भर भिगोए हुए)",
                            "1 चम्मच तेल",
                            "1 चम्मच चाट मसाला",
                            "1/2 चम्मच आमचूर पाउडर",
                            "1/4 चम्मच काला नमक",
                            "1/4 चम्मच मिर्च पाउडर"
                        ]
                    },
                    steps: {
                        en: [
                            "Pressure cook chana until tender but firm",
                            "Drain and pat dry",
                            "Toss with oil and spices",
                            "Spread on baking sheet",
                            "Roast at 200°C (400°F) for 20-25 minutes",
                            "Cool completely and store in airtight container"
                        ],
                        hi: [
                            "चनों को नरम लेकिन दृढ़ होने तक प्रेशर कुक करें",
                            "निथारें और सुखाएं",
                            "तेल और मसालों के साथ टॉस करें",
                            "बेकिंग शीट पर फैलाएं",
                            "200°C (400°F) पर 20-25 मिनट तक रोस्ट करें",
                            "पूरी तरह ठंडा करें और एयरटाइट कंटेनर में स्टोर करें"
                        ]
                    },
                    benefits: {
                        en: "Black chana is rich in protein, fiber, and iron. Roasting makes it a crunchy, low-fat snack. This helps manage blood sugar, supports muscle health, and provides sustained energy.",
                        hi: "काले चने प्रोटीन, फाइबर और आयरन से भरपूर होते हैं। रोस्टिंग इसे एक कुरकुरा, कम वसा वाला स्नैक बनाती है। यह रक्त शर्करा को प्रबंधित करने में मदद करता है, मांसपेशियों के स्वास्थ्य का समर्थन करता है और सतत ऊर्जा प्रदान करता है।"
                    }
                },
                {
                    name: "Beetroot Hummus with Veggie Sticks",
                    image: "img/hummus.jpg",
                    ingredients: {
                        en: [
                            "1 cup chickpeas (cooked)",
                            "1 small beetroot (roasted)",
                            "2 tbsp tahini",
                            "2 tbsp lemon juice",
                            "1 garlic clove",
                            "1 tbsp olive oil",
                            "Salt to taste",
                            "Assorted vegetable sticks"
                        ],
                        hi: [
                            "1 कप छोले (पके हुए)",
                            "1 छोटी चुकंदर (भुनी हुई)",
                            "2 बड़े चम्मच ताहिनी",
                            "2 बड़े चम्मच नींबू का रस",
                            "1 लहसुन की कली",
                            "1 बड़ा चम्मच ऑलिव ऑयल",
                            "नमक स्वादानुसार",
                            "मिश्रित सब्जी स्टिक्स"
                        ]
                    },
                    steps: {
                        en: [
                            "In a food processor, blend chickpeas and beetroot",
                            "Add tahini, lemon juice, garlic, and salt",
                            "Blend until smooth",
                            "While blending, drizzle in olive oil",
                            "Adjust seasoning to taste",
                            "Serve with fresh vegetable sticks"
                        ],
                        hi: [
                            "फूड प्रोसेसर में छोले और चुकंदर को ब्लेंड करें",
                            "ताहिनी, नींबू का रस, लहसुन और नमक डालें",
                            "चिकना होने तक ब्लेंड करें",
                            "ब्लेंड करते समय ऑलिव ऑयल डालें",
                            "स्वादानुसार मसाला समायोजित करें",
                            "ताजा सब्जी स्टिक्स के साथ परोसें"
                        ]
                    },
                    benefits: {
                        en: "Chickpeas provide plant-based protein and fiber. Beetroot adds antioxidants and supports blood pressure. This colorful snack is rich in nutrients that support heart health and provide anti-inflammatory benefits.",
                        hi: "छोले प्लांट-आधारित प्रोटीन और फाइबर प्रदान करते हैं। चुकंदर एंटीऑक्सिडेंट जोड़ता है और रक्तचाप का समर्थन करता है। यह रंगीन स्नैक पोषक तत्वों से भरपूर है जो हृदय स्वास्थ्य का समर्थन करता है और सूजन-रोधी लाभ प्रदान करता है।"
                    }
                }
            ],
            dinner: [
                {
                    name: "Vegetable Pulao",
                    image: "img/vegetablepulao.jpg",
                    ingredients: {
                        en: [
                            "1 cup basmati rice, soaked for 30 minutes",
                            "1 cup mixed vegetables (carrots, peas, beans, cauliflower)",
                            "1 onion, sliced",
                            "1 tomato, chopped",
                            "2 green chilies, slit",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp cumin seeds",
                            "2 cloves",
                            "1-inch cinnamon stick",
                            "2 cardamom pods",
                            "1/2 cup mint leaves",
                            "2 tbsp oil or ghee",
                            "Salt to taste",
                            "2 cups water"
                        ],
                        hi: [
                            "1 कप बासमती चावल, 30 मिनट के लिए भिगोएँ",
                            "1 कप मिश्रित सब्जियां (गाजर, मटर, बीन्स, फूलगोभी)",
                            "1 प्याज, कटा हुआ",
                            "1 टमाटर, कटा हुआ",
                            "2 हरी मिर्च, चीरा लगा हुआ",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच जीरा",
                            "2 लौंग",
                            "1 इंच दालचीनी का टुकड़ा",
                            "2 इलायची",
                            "1/2 कप पुदीना पत्तियां",
                            "2 बड़े चम्मच तेल या घी",
                            "नमक स्वादानुसार",
                            "2 कप पानी"
                        ]
                    },
                    steps: {
                        en: [
                            "Heat oil/ghee in a pressure cooker. Add whole spices and cumin seeds. Sauté until fragrant",
                            "Add sliced onions and sauté until golden brown",
                            "Add ginger-garlic paste and green chilies. Sauté for 2 minutes",
                            "Add tomatoes and cook until soft",
                            "Add mixed vegetables and sauté for 3-4 minutes",
                            "Drain soaked rice and add to the cooker. Gently mix",
                            "Add water, salt, and mint leaves. Stir well",
                            "Close the lid and cook for 2 whistles on medium flame",
                            "Let pressure release naturally. Fluff the rice with a fork",
                            "Serve hot with raita or curry"
                        ],
                        hi: [
                            "प्रेशर कुकर में तेल/घी गर्म करें। साबुत मसाले और जीरा डालें। सुगंध आने तक भूनें",
                            "कटा हुआ प्याज डालें और सुनहरा होने तक भूनें",
                            "अदरक-लहसुन पेस्ट और हरी मिर्च डालें। 2 मिनट तक भूनें",
                            "टमाटर डालें और नरम होने तक पकाएं",
                            "मिश्रित सब्जियां डालें और 3-4 मिनट तक भूनें",
                            "भीगे हुए चावल को निकालें और कुकर में डालें। हल्के हाथ से मिलाएं",
                            "पानी, नमक और पुदीना पत्तियां डालें। अच्छी तरह हिलाएं",
                            "ढक्कन बंद करें और मध्यम आंच पर 2 सीटी आने तक पकाएं",
                            "प्रेशर अपने आप रिलीज होने दें। कांटे से चावल को फ्लफ करें",
                            "रायता या करी के साथ गर्म परोसें"
                        ]
                    },
                    benefits: {
                        en: "Vegetable pulao is a balanced meal with carbohydrates from rice, fiber and vitamins from vegetables, and protein from peas. The spices aid digestion and boost metabolism. It's a light yet nutritious dinner option.",
                        hi: "वेजिटेबल पुलाव चावल से कार्बोहाइड्रेट, सब्जियों से फाइबर और विटामिन, और मटर से प्रोटीन के साथ एक संतुलित भोजन है। मसाले पाचन में सहायता करते हैं और चयापचय को बढ़ावा देते हैं। यह एक हल्का लेकिन पौष्टिक डिनर विकल्प है।"
                    }
                },
                {
                    name: "Dal Tadka with Rice",
                    image: "img/daltadkawithrice.jpg",
                    ingredients: {
                        en: [
                            "1 cup yellow moong dal",
                            "1 tomato, chopped",
                            "1 onion, chopped",
                            "1 green chili, slit",
                            "1/2 tsp turmeric powder",
                            "Salt to taste",
                            "For tadka:",
                            "2 tbsp ghee",
                            "1 tsp cumin seeds",
                            "1 tsp mustard seeds",
                            "2 dry red chilies",
                            "2 garlic cloves, crushed",
                            "Few curry leaves",
                            "Cooked rice for serving"
                        ],
                        hi: [
                            "1 कप पीली मूंग दाल",
                            "1 टमाटर, कटा हुआ",
                            "1 प्याज, कटा हुआ",
                            "1 हरी मिर्च, चीरी हुई",
                            "1/2 चम्मच हल्दी पाउडर",
                            "नमक स्वादानुसार",
                            "तड़के के लिए:",
                            "2 बड़े चम्मच घी",
                            "1 चम्मच जीरा",
                            "1 चम्मच राई के दाने",
                            "2 सूखी लाल मिर्च",
                            "2 लहसुन की कलियाँ, कुचली हुई",
                            "कुछ करी पत्ते",
                            "पक्के हुए चावल परोसने के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Pressure cook dal with turmeric and salt until soft.",
                            "Heat ghee in a pan. Add cumin and mustard seeds. Let them splutter.",
                            "Add red chilies, garlic and curry leaves. Sauté until fragrant.",
                            "Add onions and sauté until golden.",
                            "Add tomatoes and cook until soft.",
                            "Add cooked dal and simmer for 5 minutes.",
                            "Serve hot with rice."
                        ],
                        hi: [
                            "दाल को हल्दी और नमक के साथ नरम होने तक प्रेशर कुक करें।",
                            "पैन में घी गर्म करें। जीरा और राई डालें। चटकने दें।",
                            "लाल मिर्च, लहसुन और करी पत्ते डालें। सुगंध आने तक भूनें।",
                            "प्याज डालें और सुनहरा होने तक भूनें।",
                            "टमाटर डालें और नरम होने तक पकाएं।",
                            "पकी हुई दाल डालें और 5 मिनट तक उबालें।",
                            "गर्मागर्म चावल के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Moong dal is rich in protein and easy to digest. The tempering with ghee enhances flavor and aids digestion. Combined with rice, it provides a complete protein profile and sustained energy.",
                        hi: "मूंग दाल प्रोटीन से भरपूर और पचने में आसान है। घी के साथ तड़का स्वाद बढ़ाता है और पाचन में सहायता करता है। चावल के साथ संयुक्त, यह एक पूर्ण प्रोटीन प्रोफ़ाइल और सतत ऊर्जा प्रदान करता है।"
                    }
                },
                {
                    name: "Vegetable Khichdi",
                    image: "img/vegetablekhichdi.jpg",
                    ingredients: {
                        en: [
                            "1/2 cup rice",
                            "1/2 cup moong dal",
                            "1/2 cup mixed vegetables (carrots, peas, beans)",
                            "1 onion, chopped",
                            "1 tomato, chopped",
                            "1 tsp ginger-garlic paste",
                            "1 tsp cumin seeds",
                            "1/2 tsp turmeric powder",
                            "1 tsp ghee",
                            "Salt to taste",
                            "3 cups water"
                        ],
                        hi: [
                            "1/2 कप चावल",
                            "1/2 कप मूंग दाल",
                            "1/2 कप मिश्रित सब्जियां (गाजर, मटर, बीन्स)",
                            "1 प्याज, कटा हुआ",
                            "1 टमाटर, कटा हुआ",
                            "1 चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच जीरा",
                            "1/2 चम्मच हल्दी पाउडर",
                            "1 चम्मच घी",
                            "नमक स्वादानुसार",
                            "3 कप पानी"
                        ]
                    },
                    steps: {
                        en: [
                            "Wash rice and dal together. Soak for 15 minutes.",
                            "Heat ghee in a pressure cooker. Add cumin seeds and let them splutter.",
                            "Add onions and sauté until translucent.",
                            "Add ginger-garlic paste and sauté for 1 minute.",
                            "Add tomatoes and cook until soft.",
                            "Add vegetables, rice, dal, turmeric and salt. Mix well.",
                            "Add water and pressure cook for 3 whistles.",
                            "Serve hot with yogurt or pickle."
                        ],
                        hi: [
                            "चावल और दाल को एक साथ धोएं। 15 मिनट के लिए भिगोएँ।",
                            "प्रेशर कुकर में घी गर्म करें। जीरा डालें और चटकने दें।",
                            "प्याज डालें और पारदर्शी होने तक भूनें।",
                            "अदरक-लहसुन पेस्ट डालें और 1 मिनट तक भूनें।",
                            "टमाटर डालें और नरम होने तक पकाएं।",
                            "सब्जियां, चावल, दाल, हल्दी और नमक डालें। अच्छी तरह मिलाएं।",
                            "पानी डालें और 3 सीटी आने तक प्रेशर कुक करें।",
                            "गर्मागर्म दही या अचार के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Khichdi is a complete meal providing carbohydrates, protein, and fiber. It's easy to digest and gentle on the stomach. This comforting dish is perfect for dinner and helps in detoxification.",
                        hi: "खिचड़ी कार्बोहाइड्रेट, प्रोटीन और फाइबर प्रदान करने वाला एक संपूर्ण भोजन है। यह पचने में आसान और पेट के लिए हल्का है। यह आरामदायक व्यंजन डिनर के लिए परफेक्ट है और डिटॉक्सिफिकेशन में मदद करता है।"
                    }
                },
                {
                    name: "Lentil and Vegetable Soup",
                    image: "img/lentil.jpg",
                    ingredients: {
                        en: [
                            "1/2 cup masoor dal",
                            "1 cup mixed vegetables",
                            "1 onion, chopped",
                            "2 garlic cloves, minced",
                            "1 tsp cumin seeds",
                            "1/2 tsp turmeric powder",
                            "4 cups vegetable broth",
                            "1 tbsp olive oil",
                            "Salt and pepper to taste",
                            "Fresh coriander for garnish"
                        ],
                        hi: [
                            "1/2 कप मसूर दाल",
                            "1 कप मिश्रित सब्जियाँ",
                            "1 प्याज, कटा हुआ",
                            "2 लहसुन की कलियाँ, बारीक कटी हुई",
                            "1 चम्मच जीरा",
                            "1/2 चम्मच हल्दी पाउडर",
                            "4 कप सब्जी शोरबा",
                            "1 बड़ा चम्मच ऑलिव ऑयल",
                            "नमक और काली मिर्च स्वादानुसार",
                            "ताजा धनिया गार्निश के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Heat oil in a pot, add cumin seeds",
                            "Add onion and garlic, sauté until soft",
                            "Add vegetables and sauté for 5 minutes",
                            "Add dal, turmeric, broth, salt and pepper",
                            "Bring to boil, then simmer for 30 minutes",
                            "Garnish with fresh coriander",
                            "Serve hot"
                        ],
                        hi: [
                            "एक बर्तन में तेल गर्म करें, जीरा डालें",
                            "प्याज और लहसुन डालें, नरम होने तक भूनें",
                            "सब्जियाँ डालें और 5 मिनट तक भूनें",
                            "दाल, हल्दी, शोरबा, नमक और काली मिर्च डालें",
                            "उबाल लें, फिर 30 मिनट तक उबालें",
                            "ताजा धनिया से गार्निश करें",
                            "गर्मागर्म परोसें"
                        ]
                    },
                    benefits: {
                        en: "Masoor dal is rich in protein and fiber. The vegetables add vitamins and minerals. This light dinner is easy to digest, supports heart health, and provides hydration and nutrients without excess calories.",
                        hi: "मसूर दाल प्रोटीन और फाइबर से भरपूर होती है। सब्जियां विटामिन और खनिज जोड़ती हैं। यह हल्का रात का खाना पचाने में आसान है, हृदय स्वास्थ्य का समर्थन करता है, और अतिरिक्त कैलोरी के बिना हाइड्रेशन और पोषक तत्व प्रदान करता है।"
                    }
                },
                {
                    name: "Tofu and Vegetable Stir Fry",
                    image: "img/tofu.jpg",
                    ingredients: {
                        en: [
                            "200g firm tofu, cubed",
                            "2 cups mixed vegetables",
                            "1 bell pepper, sliced",
                            "1 tbsp soy sauce (low sodium)",
                            "1 tsp ginger-garlic paste",
                            "1 tbsp sesame oil",
                            "1 tsp cornstarch",
                            "2 tbsp water",
                            "1 tsp sesame seeds"
                        ],
                        hi: [
                            "200g फर्म टोफू, क्यूब्स में कटा हुआ",
                            "2 कप मिश्रित सब्जियाँ",
                            "1 शिमला मिर्च, कटा हुआ",
                            "1 बड़ा चम्मच सोया सॉस (कम सोडियम)",
                            "1 चम्मच अदरक-लहसुन पेस्ट",
                            "1 बड़ा चम्मच तिल का तेल",
                            "1 चम्मच कॉर्नस्टार्च",
                            "2 बड़े चम्मच पानी",
                            "1 चम्मच तिल"
                        ]
                    },
                    steps: {
                        en: [
                            "Press tofu to remove excess water",
                            "Mix cornstarch with water to make slurry",
                            "Heat oil in wok, add tofu and stir fry until golden",
                            "Add ginger-garlic paste and vegetables",
                            "Stir fry for 5-7 minutes until crisp-tender",
                            "Add soy sauce and cornstarch slurry",
                            "Toss until sauce thickens",
                            "Garnish with sesame seeds and serve"
                        ],
                        hi: [
                            "अतिरिक्त पानी निकालने के लिए टोफू को दबाएं",
                            "कॉर्नस्टार्च को पानी के साथ घोल बनाएं",
                            "वोक में तेल गर्म करें, टोफू डालें और सुनहरा होने तक स्टर फ्राई करें",
                            "अदरक-लहसुन पेस्ट और सब्जियाँ डालें",
                            "खस्ता-नरम होने तक 5-7 मिनट तक स्टर फ्राई करें",
                            "सोया सॉस और कॉर्नस्टार्च घोल डालें",
                            "सॉस गाढ़ा होने तक टॉस करें",
                            "तिल से गार्निश करें और परोसें"
                        ]
                    },
                    benefits: {
                        en: "Tofu provides plant-based protein and isoflavones. The vegetables add fiber and antioxidants. This low-carb dinner supports heart health, provides essential nutrients, and helps maintain healthy weight.",
                        hi: "टोफू प्लांट-आधारित प्रोटीन और आइसोफ्लेवोन्स प्रदान करता है। सब्जियां फाइबर और एंटीऑक्सिडेंट जोड़ती हैं। यह कम-कार्ब रात का खाना हृदय स्वास्थ्य का समर्थन करता है, आवश्यक पोषक तत्व प्रदान करता है और स्वस्थ वजन बनाए रखने में मदद करता है।"
                    }
                },
                {
                    name: "Mushroom and Spinach Curry",
                    image: "img/mushroom.jpg",
                    ingredients: {
                        en: [
                            "200g mushrooms, sliced",
                            "2 cups spinach",
                            "1 onion, chopped",
                            "2 tomatoes, pureed",
                            "1 tsp ginger-garlic paste",
                            "1 tsp garam masala",
                            "1/2 tsp turmeric",
                            "1/2 cup coconut milk (light)",
                            "1 tbsp oil",
                            "Salt to taste"
                        ],
                        hi: [
                            "200g मशरूम, कटा हुआ",
                            "2 कप पालक",
                            "1 प्याज, कटा हुआ",
                            "2 टमाटर, प्यूरी किया हुआ",
                            "1 चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच गरम मसाला",
                            "1/2 चम्मच हल्दी",
                            "1/2 कप नारियल का दूध (हल्का)",
                            "1 बड़ा चम्मच तेल",
                            "नमक स्वादानुसार"
                        ]
                    },
                    steps: {
                        en: [
                            "Heat oil, add onions and sauté until golden",
                            "Add ginger-garlic paste and cook for 1 minute",
                            "Add mushrooms and cook until tender",
                            "Add tomato puree and spices, cook for 5 minutes",
                            "Add spinach and cook until wilted",
                            "Add coconut milk and simmer for 5 minutes",
                            "Serve hot with brown rice"
                        ],
                        hi: [
                            "तेल गर्म करें, प्याज डालें और सुनहरा होने तक भूनें",
                            "अदरक-लहसुन पेस्ट डालें और 1 मिनट तक पकाएं",
                            "मशरूम डालें और नरम होने तक पकाएं",
                            "टमाटर प्यूरी और मसाले डालें, 5 मिनट तक पकाएं",
                            "पालक डालें और मुरझाने तक पकाएं",
                            "नारियल का दूध डालें और 5 मिनट तक उबालें",
                            "गर्मागर्म ब्राउन राइस के साथ परोसें"
                        ]
                    },
                    benefits: {
                        en: "Mushrooms are rich in B vitamins and selenium. Spinach provides iron and antioxidants. This low-calorie curry supports immune function, provides anti-inflammatory benefits, and helps maintain healthy blood pressure.",
                        hi: "मशरूम बी विटामिन और सेलेनियम से भरपूर होते हैं। पालक आयरन और एंटीऑक्सिडेंट प्रदान करता है। यह कम-कैलोरी करी प्रतिरक्षा कार्य का समर्थन करती है, सूजन-रोधी लाभ प्रदान करती है और स्वस्थ रक्तचाप बनाए रखने में मदद करती है।"
                    }
                },
                {
                    name: "Fish Curry with Fenugreek",
                    image: "img/fishcurry.jpg",
                    ingredients: {
                        en: [
                            "500g fish fillets",
                            "1 onion, chopped",
                            "2 tomatoes, chopped",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp turmeric powder",
                            "1 tsp coriander powder",
                            "1 tbsp kasuri methi",
                            "1 cup coconut milk (light)",
                            "1 tbsp oil",
                            "Salt to taste"
                        ],
                        hi: [
                            "500g मछली फिलेट",
                            "1 प्याज, कटा हुआ",
                            "2 टमाटर, कटा हुआ",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच हल्दी पाउडर",
                            "1 चम्मच धनिया पाउडर",
                            "1 बड़ा चम्मच कसूरी मेथी",
                            "1 कप नारियल का दूध (हल्का)",
                            "1 बड़ा चम्मच तेल",
                            "नमक स्वादानुसार"
                        ]
                    },
                    steps: {
                        en: [
                            "Marinate fish with turmeric and salt",
                            "Heat oil, add onions and sauté until golden",
                            "Add ginger-garlic paste and cook for 1 minute",
                            "Add tomatoes and spices, cook until soft",
                            "Add coconut milk and simmer for 10 minutes",
                            "Gently add fish pieces and cook for 8-10 minutes",
                            "Add kasuri methi and remove from heat",
                            "Serve hot with steamed rice"
                        ],
                        hi: [
                            "मछली को हल्दी और नमक के साथ मैरिनेट करें",
                            "तेल गर्म करें, प्याज डालें और सुनहरा होने तक भूनें",
                            "अदरक-लहसुन पेस्ट डालें और 1 मिनट तक पकाएं",
                            "टमाटर और मसाले डालें, नरम होने तक पकाएं",
                            "नारियल का दूध डालें और 10 मिनट तक उबालें",
                            "धीरे से मछली के टुकड़े डालें और 8-10 मिनट तक पकाएं",
                            "कसूरी मेथी डालें और आंच से उतारें",
                            "गर्मागर्म उबले चावल के साथ परोसें"
                        ]
                    },
                    benefits: {
                        en: "Fish provides omega-3 fatty acids for heart and brain health. Fenugreek adds flavor and helps regulate blood sugar. This protein-rich dinner supports cardiovascular health and provides anti-inflammatory benefits.",
                        hi: "मछली हृदय और मस्तिष्क के स्वास्थ्य के लिए ओमेगा-3 फैटी एसिड प्रदान करती है। मेथी स्वाद जोड़ती है और रक्त शर्करा को नियंत्रित करने में मदद करती है। यह प्रोटीन से भरपूर रात का खाना हृदय स्वास्थ्य का समर्थन करता है और सूजन-रोधी लाभ प्रदान करता है।"
                    }
                },
                {
                    name: "Vegetable and Lentil Stew",
                    image: "img/lentils.jpg",
                    ingredients: {
                        en: [
                            "1/2 cup mixed lentils",
                            "2 cups mixed vegetables",
                            "1 onion, chopped",
                            "2 garlic cloves, minced",
                            "1 tsp cumin powder",
                            "1/2 tsp turmeric",
                            "4 cups vegetable broth",
                            "1 tbsp olive oil",
                            "Salt and pepper to taste",
                            "Fresh parsley for garnish"
                        ],
                        hi: [
                            "1/2 कप मिश्रित दालें",
                            "2 कप मिश्रित सब्जियाँ",
                            "1 प्याज, कटा हुआ",
                            "2 लहसुन की कलियाँ, बारीक कटी हुई",
                            "1 चम्मच जीरा पाउडर",
                            "1/2 चम्मच हल्दी",
                            "4 कप सब्जी शोरबा",
                            "1 बड़ा चम्मच ऑलिव ऑयल",
                            "नमक और काली मिर्च स्वादानुसार",
                            "गार्निश के लिए ताजा अजमोद"
                        ]
                    },
                    steps: {
                        en: [
                            "Heat oil in a pot, add onion and garlic",
                            "Sauté until soft, add vegetables and cook for 5 minutes",
                            "Add lentils, spices, and broth",
                            "Bring to boil, then simmer for 45 minutes",
                            "Adjust seasoning to taste",
                            "Garnish with parsley and serve"
                        ],
                        hi: [
                            "एक बर्तन में तेल गर्म करें, प्याज और लहसुन डालें",
                            "नरम होने तक भूनें, सब्जियाँ डालें और 5 मिनट तक पकाएं",
                            "दालें, मसाले और शोरबा डालें",
                            "उबाल लें, फिर 45 मिनट तक उबालें",
                            "स्वादानुसार मसाला समायोजित करें",
                            "अजमोद से गार्निश करें और परोसें"
                        ]
                    },
                    benefits: {
                        en: "Lentils provide plant-based protein and fiber. The vegetables add vitamins and minerals. This hearty stew supports digestive health, provides sustained energy, and helps maintain healthy cholesterol levels.",
                        hi: "दालें प्लांट-आधारित प्रोटीन और फाइबर प्रदान करती हैं। सब्जियां विटामिन और खनिज जोड़ती हैं। यह हार्दिक स्टू पाचन स्वास्थ्य का समर्थन करता है, सतत ऊर्जा प्रदान करता है और स्वस्थ कोलेस्ट्रॉल के स्तर को बनाए रखने में मदद करता है।"
                    }
                }
            ]
        };

        // DOM Elements
        const recipeDisplay = document.getElementById('recipeDisplay');
        const recipeTitle = document.getElementById('recipeTitle');
        const recipeImage = document.getElementById('recipeImage');
        const ingredientsListEn = document.getElementById('ingredientsListEn');
        const ingredientsListHi = document.getElementById('ingredientsListHi');
        const stepsListEn = document.getElementById('stepsListEn');
        const stepsListHi = document.getElementById('stepsListHi');
        const benefitsTextEn = document.getElementById('benefitsTextEn');
        const benefitsTextHi = document.getElementById('benefitsTextHi');
        const randomBtn = document.getElementById('randomBtn');
        const autoBtn = document.getElementById('autoBtn');
        const timerDisplay = document.getElementById('timerDisplay');
        const categoryLabel = document.getElementById('categoryLabel');
        const contentEn = document.getElementById('content-en');
        const contentHi = document.getElementById('content-hi');
        
        // Current state
        let currentCategory = '';
        let autoInterval = null;
        let countdown = 5;
        
        // Display a random recipe from the current category
        function showRandomRecipe() {
            if (!currentCategory) return;
            
            const categoryRecipes = recipes[currentCategory];
            if (categoryRecipes.length === 0) return;
            
            const randomIndex = Math.floor(Math.random() * categoryRecipes.length);
            const recipe = categoryRecipes[randomIndex];
            
            displayRecipe(recipe);
        }
        
        // Display a specific recipe
        function displayRecipe(recipe) {
            recipeTitle.textContent = recipe.name;
            recipeImage.src = recipe.image;
            recipeImage.alt = recipe.name;
            
            // Set category label
            categoryLabel.textContent = currentCategory.charAt(0).toUpperCase() + currentCategory.slice(1);
            
            // Display ingredients
            displayList(ingredientsListEn, recipe.ingredients.en);
            displayList(ingredientsListHi, recipe.ingredients.hi);
            
            // Display steps
            displayList(stepsListEn, recipe.steps.en, 'ol');
            displayList(stepsListHi, recipe.steps.hi, 'ol');
            
            // Display benefits
            benefitsTextEn.textContent = recipe.benefits.en;
            benefitsTextHi.textContent = recipe.benefits.hi;
            
            // Show the recipe display area
            recipeDisplay.style.display = 'block';
            
            // Scroll to recipe display
            recipeDisplay.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
        
        // Helper function to display list items
        function displayList(container, items, type = 'ul') {
            container.innerHTML = '';
            items.forEach(item => {
                const li = document.createElement('li');
                li.textContent = item;
                container.appendChild(li);
            });
        }
        
        // Update timer display
        function updateTimer() {
            timerDisplay.textContent = `${countdown}s`;
            timerDisplay.style.display = 'block';
            countdown--;
            
            if (countdown < 0) {
                countdown = 5;
                showRandomRecipe();
            }
        }
        
        // Toggle auto generate
        function toggleAutoGenerate() {
            if (autoInterval) {
                clearInterval(autoInterval);
                autoInterval = null;
                countdown = 5;
                timerDisplay.style.display = 'none';
                autoBtn.innerHTML = '<i class="fas fa-sync"></i> Auto Generate';
            } else {
                autoInterval = setInterval(updateTimer, 1000);
                autoBtn.innerHTML = '<i class="fas fa-stop"></i> Stop Auto';
                timerDisplay.style.display = 'block';
                updateTimer();
            }
        }
        
        // Set up language tabs
        function setupLangTabs() {
            document.querySelectorAll('.lang-tab').forEach(tab => {
                tab.addEventListener('click', function() {
                    const lang = this.getAttribute('data-lang');
                    
                    // Remove active class from all tabs
                    document.querySelectorAll('.lang-tab').forEach(t => {
                        t.classList.remove('active');
                    });
                    
                    // Add active class to clicked tab
                    this.classList.add('active');
                    
                    // Hide all language content
                    document.querySelectorAll('.lang-content').forEach(content => {
                        content.classList.remove('active');
                    });
                    
                    // Show selected language content
                    document.getElementById(`content-${lang}`).classList.add('active');
                });
            });
        }
        
        // Initialize the app
        function init() {
            setupLangTabs();
            
            // Category button event listeners
            document.querySelectorAll('.category-btn').forEach(button => {
                button.addEventListener('click', function() {
                    currentCategory = this.getAttribute('data-category');
                    showRandomRecipe();
                    
                    // Stop auto generate when switching categories
                    if (autoInterval) {
                        toggleAutoGenerate();
                    }
                });
            });
            
            // Random button event listener
            randomBtn.addEventListener('click', showRandomRecipe);
            
            // Auto button event listener
            autoBtn.addEventListener('click', toggleAutoGenerate);
            
            // Show breakfast recipes by default
            document.querySelector('.breakfast-btn').click();
        }
        
        // Start the app
        window.addEventListener('DOMContentLoaded', init);
    </script>
</body>
</html>