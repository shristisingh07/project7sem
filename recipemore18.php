<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indian Recipes for Adults</title>
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
            background:#e9ecef;
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
            color: #fff;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        header h1 {
            font-family: 'Roboto Slab', serif;
            font-size: 3.2rem;
            margin-bottom: 10px;
            background: linear-gradient(to right, #ff512f, #f09819, #ff512f);
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
            background: linear-gradient(to right, #ff512f, #f09819);
            border-radius: 2px;
        }

        header p {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
            color: black;
            text-shadow: 0 1px 2px rgba(0,0,0,0.3);
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
            box-shadow: 0 6px 15px rgba(0,0,0,0.15);
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
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
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

        .breakfast-btn:hover { background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%); }
        .lunch-btn:hover { background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%); }
        .snacks-btn:hover { background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%); }
        .dinner-btn:hover { background: linear-gradient(135deg, #d4fc79 0%, #96e6a1 100%); }

        .recipe-display {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
            margin-top: 20px;
            display: none;
            position: relative;
            overflow: hidden;
        }

        .recipe-display::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(to right, #ff512f, #f09819);
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
            color: #ff6b6b;
            flex: 1;
            text-shadow: 0 2px 3px rgba(0,0,0,0.1);
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
            background: linear-gradient(to right, #ff512f, #f09819);
            border-radius: 2px;
        }

        .controls {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .control-btn {
            background: #4a69bd;
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
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        .control-btn:hover {
            background: #1e3799;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        }

        .timer-display {
            background: rgba(255,255,255,0.9);
            color: #ff512f;
            padding: 8px 15px;
            border-radius: 30px;
            font-weight: 600;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
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
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
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
            background: #e9ecef;
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
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            padding: 10px 25px;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 1.1rem;
        }

        .lang-tab.active {
            background: #4a69bd;
            color: white;
            border-color: #4a69bd;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        /* NEW CARD STYLES */
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
            box-shadow: 0 6px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .recipe-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.15);
        }
        
        .recipe-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, #ff512f, #f09819);
        }
        
        .card-title {
            font-family: 'Roboto Slab', serif;
            font-size: 1.6rem;
            color: #1e3799;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #ff9a9e;
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
            color: #ff6b6b;
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
            background: #4a69bd;
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
            border-left: 4px solid #4a69bd;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            flex-grow: 1;
        }

        footer {
            text-align: center;
            padding: 30px 0;
            color: #fff;
            margin-top: 40px;
            font-size: 1.1rem;
            text-shadow: 0 1px 2px rgba(0,0,0,0.3);
        }

        .hidden {
            display: none;
        }

        .difficulty-level {
            display: inline-block;
            background: #ff6b6b;
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
            background: #f8f9fa;
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
            background: #f8f9fa;
            border-radius: 12px;
            padding: 15px;
            flex: 1;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: #ff6b6b;
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
            background:#f77623;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            z-index: 2;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        
        /* Responsive design */
        @media (max-width: 768px) {
            .recipe-top {
                flex-direction: column;
            }
			.category-label {
            position: absolute;
            top: 20px;
            right: 20px;
            background:#f77623;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            z-index: 2;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
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
        }
		.label{
			background:#f77623;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            z-index: 2;
			width:10rem;
			margin-top:1rem;
			margin-left:1rem;
			text-align:center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);	
		}
		a{
			text-decoration:none;
		}
        .alcohol-warning {
            background: #ffebee;
            border-left: 4px solid #f44336;
            padding: 10px 15px;
            border-radius: 4px;
            margin-top: 10px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1><i class="fas fa-utensils"></i> Indian Recipes for Adults</h1>
            <p>Discover sophisticated and flavorful recipes from every corner of India</p>
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
                <h2 class="recipe-title" id="recipeTitle">Masala Dosa</h2>
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
                        <img src="https://images.unsplash.com/photo-1630919554025-4c0a1a1a4f5e?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=600&w=800" class="recipe-image" id="recipeImage" alt="Masala Dosa">
                    </div>
                    
                    <div class="recipe-details">
                        <div class="lang-tabs-container">
                            <div class="lang-tabs">
                                <div class="lang-tab active" data-lang="en">English</div>
                                <div class="lang-tab" data-lang="hi">हिंदी</div>
                            </div>
                        </div>
                        
                        <div class="prep-time">
                            <i class="fas fa-clock"></i> Prep Time: 20 min | Cook Time: 15 min
                        </div>
                        
                        <div class="recipe-stats">
                            <div class="stat-box">
                                <div class="stat-value">4.8</div>
                                <div class="stat-label">Rating</div>
                            </div>
                            <div class="stat-box">
                                <div class="stat-value">2</div>
                                <div class="stat-label">Servings</div>
                            </div>
                            <div class="stat-box">
                                <div class="stat-value">320</div>
                                <div class="stat-label">Calories</div>
                            </div>
                        </div>
                        
                        <div class="lang-content active" id="content-en">
                            <div class="recipe-cards">
                                <div class="recipe-card">
                                    <h3 class="card-title">Ingredients</h3>
                                    <div class="card-content">
                                        <ul class="ingredients-list" id="ingredientsListEn"></ul>
                                    </div>
                                </div>
                                
                                <div class="recipe-card">
                                    <h3 class="card-title">Preparation Method</h3>
                                    <div class="card-content">
                                        <ol class="steps-list" id="stepsListEn"></ol>
                                    </div>
                                </div>
                                
                                <div class="recipe-card">
                                    <h3 class="card-title">Health Benefits</h3>
                                    <div class="card-content">
                                        <p class="benefits-text" id="benefitsTextEn"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="lang-content" id="content-hi">
                            <div class="recipe-cards">
                                <div class="recipe-card">
                                    <h3 class="card-title">सामग्री</h3>
                                    <div class="card-content">
                                        <ul class="ingredients-list" id="ingredientsListHi"></ul>
                                    </div>
                                </div>
                                
                                <div class="recipe-card">
                                    <h3 class="card-title">बनाने की विधि</h3>
                                    <div class="card-content">
                                        <ol class="steps-list" id="stepsListHi"></ol>
                                    </div>
                                </div>
                                
                                <div class="recipe-card">
                                    <h3 class="card-title">स्वास्थ्य लाभ</h3>
                                    <div class="card-content">
                                        <p class="benefits-text" id="benefitsTextHi"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <footer>
        <p>Made with ❤️ for Indian Adults | Enjoy delicious and sophisticated meals!</p>
    </footer>

    <script>
        // Recipe database with 10 recipes per category (for adults 18+)
        const recipes = {
            breakfast: [
                {
                    name: "Egg Masala Dosa",
                    image: "img/eggmasaladosa.jpg",
                    ingredients: {
                        en: [
                            "2 cups rice",
                            "1 cup urad dal",
                            "1/2 tsp fenugreek seeds",
                            "Salt to taste",
                            "Oil for cooking",
                            "3 eggs, scrambled with spices",
                            "1 onion, finely chopped",
                            "2 green chilies, chopped",
                            "1 tsp mustard seeds",
                            "1/2 tsp turmeric powder",
                            "Few curry leaves",
                            "2 tbsp oil",
                            "Optional: 1 tbsp white wine for deglazing"
                        ],
                        hi: [
                            "2 कप चावल",
                            "1 कप उड़द दाल",
                            "1/2 चम्मच मेथी दाना",
                            "नमक स्वादानुसार",
                            "पकाने के लिए तेल",
                            "3 अंडे, मसालों के साथ तले हुए",
                            "1 प्याज, बारीक कटा हुआ",
                            "2 हरी मिर्च, कटी हुई",
                            "1 चम्मच राई के दाने",
                            "1/2 चम्मच हल्दी पाउडर",
                            "कुछ करी पत्ते",
                            "2 बड़े चम्मच तेल",
                            "वैकल्पिक: डीग्लेज़िंग के लिए 1 बड़ा चम्मच व्हाइट वाइन"
                        ]
                    },
                    steps: {
                        en: [
                            "Soak rice and dal separately for 6 hours with fenugreek seeds in dal",
                            "Grind to smooth batter, mix together and ferment overnight",
                            "For egg filling, heat oil and add mustard seeds",
                            "Add curry leaves, green chilies and onions",
                            "Deglaze with white wine (optional)",
                            "Add turmeric and scrambled eggs, mix well",
                            "Heat dosa pan, pour batter and spread thin",
                            "Drizzle oil, cook until crisp",
                            "Place egg filling and fold dosa"
                        ],
                        hi: [
                            "चावल और दाल को अलग-अलग 6 घंटे के लिए भिगोएं (दाल में मेथी दाना मिलाएं)",
                            "बारीक पीसकर बैटर बनाएं, मिलाएं और रात भर किण्वित होने दें",
                            "अंडे की भरने के लिए, तेल गर्म करें और राई डालें",
                            "करी पत्ते, हरी मिर्च और प्याज डालें",
                            "व्हाइट वाइन से डीग्लेज़ करें (वैकल्पिक)",
                            "हल्दी और तले हुए अंडे डालें, अच्छी तरह मिलाएं",
                            "डोसा पैन गर्म करें, बैटर डालकर फैलाएं",
                            "तेल डालें, कुरकुरा होने तक पकाएं",
                            "अंडे की भरावन रखें और डोसा मोड़ें"
                        ]
                    },
                    benefits: {
                        en: "Dosa is a fermented food rich in probiotics, great for gut health. Eggs provide high-quality protein and essential nutrients. This balanced breakfast keeps you full for hours and provides sustained energy.",
                        hi: "डोसा एक किण्वित भोजन है जो प्रोबायोटिक्स से भरपूर है और आंतों के स्वास्थ्य के लिए बहुत अच्छा है। अंडे उच्च गुणवत्ता वाला प्रोटीन और आवश्यक पोषक तत्व प्रदान करते हैं। यह संतुलित नाश्ता आपको घंटों तक भरा हुआ रखता है और सतत ऊर्जा प्रदान करता है।"
                    }
                },
                {
                    name: "Bacon & Egg Poha",
                    image: "img/baconeggpoha.jpg",
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
                    name: "Keema Paratha",
                    image: "img/keemaparatha.jpg",
                    ingredients: {
                        en: [
                            "2 cups whole wheat flour",
                            "250g minced lamb",
                            "1 onion, finely chopped",
                            "2 green chilies, finely chopped",
                            "1 tsp ginger paste",
                            "1 tsp garlic paste",
                            "1 tsp garam masala",
                            "1/2 tsp turmeric powder",
                            "Salt to taste",
                            "Water as needed",
                            "Ghee for cooking"
                        ],
                        hi: [
                            "2 कप गेहूं का आटा",
                            "250g कीमा बना हुआ मटन",
                            "1 प्याज, बारीक कटा हुआ",
                            "2 हरी मिर्च, बारीक कटी हुई",
                            "1 चम्मच अदरक पेस्ट",
                            "1 चम्मच लहसुन पेस्ट",
                            "1 चम्मच गरम मसाला",
                            "1/2 चम्मच हल्दी पाउडर",
                            "नमक स्वादानुसार",
                            "आवश्यकतानुसार पानी",
                            "पकाने के लिए घी"
                        ]
                    },
                    steps: {
                        en: [
                            "Mix flour, salt and water to make a soft dough. Cover and rest for 20 minutes.",
                            "Heat oil in a pan. Add onions and sauté until golden.",
                            "Add ginger-garlic paste and green chilies. Sauté for 1 minute.",
                            "Add minced lamb and cook until browned.",
                            "Add spices and cook for 5 minutes. Let filling cool.",
                            "Divide dough and filling into equal portions.",
                            "Roll a dough ball, place filling, seal and roll out carefully.",
                            "Cook on hot tawa with ghee until golden brown on both sides.",
                            "Serve hot with yogurt and pickle."
                        ],
                        hi: [
                            "आटा, नमक और पानी मिलाकर नरम आटा गूंथें। ढककर 20 मिनट रख दें।",
                            "पैन में तेल गर्म करें। प्याज डालें और सुनहरा होने तक भूनें।",
                            "अदरक-लहसुन पेस्ट और हरी मिर्च डालें। 1 मिनट तक भूनें।",
                            "कीमा बना हुआ मटन डालें और भूरा होने तक पकाएं।",
                            "मसाले डालें और 5 मिनट तक पकाएं। भरावन को ठंडा होने दें।",
                            "आटे और भरावन को बराबर भागों में बांटें।",
                            "आटे की लोई बेलें, भरावन रखें, बंद करें और धीरे से बेलें।",
                            "गरम तवे पर घी डालकर दोनों तरफ सुनहरा होने तक पकाएं।",
                            "गर्मागर्म दही और अचार के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Lamb keema provides high-quality protein and iron. Whole wheat adds fiber which aids digestion. This protein-rich breakfast provides sustained energy throughout the day.",
                        hi: "मटन कीमा उच्च गुणवत्ता वाला प्रोटीन और आयरन प्रदान करता है। गेहूं फाइबर जोड़ता है जो पाचन में सहायता करता है। यह प्रोटीन से भरपूर नाश्ता पूरे दिन सतत ऊर्जा प्रदान करता है।"
                    }
                },
                {
                    name: "Chicken Sausage Upma",
                    image: "img/chickensausageupma.jpg",
                    ingredients: {
                        en: [
                            "1 cup semolina (rava)",
                            "2 tbsp oil",
                            "1 tsp mustard seeds",
                            "1 tsp urad dal",
                            "1 onion, finely chopped",
                            "4 chicken sausages, sliced",
                            "2 green chilies, slit",
                            "1 inch ginger, grated",
                            "8-10 curry leaves",
                            "1/4 tsp turmeric powder",
                            "Salt to taste",
                            "2.5 cups water",
                            "Fresh coriander for garnish"
                        ],
                        hi: [
                            "1 कप सूजी (रवा)",
                            "2 बड़े चम्मच तेल",
                            "1 चम्मच राई के दाने",
                            "1 चम्मच उड़द दाल",
                            "1 प्याज, बारीक कटा हुआ",
                            "4 चिकन सॉसेज, कटा हुआ",
                            "2 हरी मिर्च, चीरी हुई",
                            "1 इंच अदरक, कद्दूकस किया हुआ",
                            "8-10 करी पत्ते",
                            "1/4 चम्मच हल्दी पाउडर",
                            "नमक स्वादानुसार",
                            "2.5 कप पानी",
                            "ताजा धनिया गार्निश के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Dry roast semolina in a pan until aromatic and light golden. Set aside.",
                            "Heat oil in the same pan. Add mustard seeds and urad dal. Let them splutter.",
                            "Add curry leaves, green chilies, and ginger. Sauté for 30 seconds.",
                            "Add onions and sauté until translucent.",
                            "Add sausage slices and cook until browned.",
                            "Add water, salt, and turmeric. Bring to a boil.",
                            "Slowly add roasted semolina, stirring continuously to avoid lumps.",
                            "Cover and cook on low heat for 5 minutes until water is absorbed.",
                            "Garnish with fresh coriander and serve."
                        ],
                        hi: [
                            "एक पैन में सूजी को सुखा भूनें जब तक सुगंधित और हल्का सुनहरा न हो जाए। अलग रख दें।",
                            "उसी पैन में तेल गर्म करें। राई और उड़द दाल डालें। चटकने दें।",
                            "करी पत्ते, हरी मिर्च और अदरक डालें। 30 सेकंड तक भूनें।",
                            "प्याज डालें और पारदर्शी होने तक भूनें।",
                            "सॉसेज के स्लाइस डालें और भूरा होने तक पकाएं।",
                            "पानी, नमक और हल्दी डालें। उबाल लें।",
                            "धीरे-धीरे भुनी हुई सूजी डालें, लगातार चलाते हुए गांठें बनने से बचाएं।",
                            "ढककर धीमी आंच पर 5 मिनट तक पकाएं जब तक पानी अवशोषित न हो जाए।",
                            "ताजा धनिया से गार्निश करें और परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Upma is a light and easily digestible breakfast. Chicken sausages add protein and flavor. This balanced meal provides sustained energy without feeling heavy.",
                        hi: "उपमा एक हल्का और आसानी से पचने वाला नाश्ता है। चिकन सॉसेज प्रोटीन और स्वाद जोड़ते हैं। यह संतुलित भोजन भारी महसूस किए बिना सतत ऊर्जा प्रदान करता है।"
                    }
                },
                {
                    name: "Beef Keema Omelette",
                    image: "img/beef.jpg",
                    ingredients: {
                        en: [
                            "4 eggs",
                            "100g minced beef",
                            "1 onion, finely chopped",
                            "1 tomato, finely chopped",
                            "1 green chili, finely chopped",
                            "2 tbsp coriander leaves, chopped",
                            "1/2 tsp cumin seeds",
                            "1/4 tsp turmeric powder",
                            "1/4 tsp red chili powder",
                            "Salt to taste",
                            "2 tbsp oil",
                            "Optional: 1 tsp Worcestershire sauce"
                        ],
                        hi: [
                            "4 अंडे",
                            "100g कीमा बना हुआ बीफ",
                            "1 प्याज, बारीक कटा हुआ",
                            "1 टमाटर, बारीक कटा हुआ",
                            "1 हरी मिर्च, बारीक कटी हुई",
                            "2 बड़े चम्मच धनिया पत्ती, कटी हुई",
                            "1/2 चम्मच जीरा",
                            "1/4 चम्मच हल्दी पाउडर",
                            "1/4 चम्मच लाल मिर्च पाउडर",
                            "नमक स्वादानुसार",
                            "2 बड़े चम्मच तेल",
                            "वैकल्पिक: 1 चम्मच वर्सेस्टरशायर सॉस"
                        ]
                    },
                    steps: {
                        en: [
                            "In a pan, heat oil and add cumin seeds.",
                            "Add minced beef and cook until browned.",
                            "Add onions, tomatoes, green chilies, and spices. Cook for 5 minutes.",
                            "Add Worcestershire sauce if using. Set aside.",
                            "Beat eggs with salt in a bowl.",
                            "Heat oil in a non-stick pan. Pour egg mixture.",
                            "When eggs start to set, spread keema mixture on one half.",
                            "Fold omelette and cook until golden brown.",
                            "Serve hot with toast."
                        ],
                        hi: [
                            "एक पैन में तेल गर्म करें और जीरा डालें।",
                            "कीमा बना हुआ बीफ डालें और भूरा होने तक पकाएं।",
                            "प्याज, टमाटर, हरी मिर्च और मसाले डालें। 5 मिनट तक पकाएं।",
                            "यदि उपयोग कर रहे हैं तो वर्सेस्टरशायर सॉस डालें। अलग रख दें।",
                            "एक कटोरे में नमक के साथ अंडे फेंटें।",
                            "नॉन-स्टिक पैन में तेल गर्म करें। अंडे का मिश्रण डालें।",
                            "जब अंडे सेट होने लगें, तो एक आधे हिस्से पर कीमा मिश्रण फैलाएं।",
                            "ओमलेट को मोड़ें और सुनहरा भूरा होने तक पकाएं।",
                            "टोस्ट के साथ गर्मागर्म परोसें।"
                        ]
                    },
                    benefits: {
                        en: "This protein-packed omelette provides essential amino acids from eggs and beef. The combination offers iron, zinc, and B vitamins. It's a satisfying breakfast that keeps you full for hours.",
                        hi: "यह प्रोटीन से भरपूर ओमलेट अंडे और बीफ से आवश्यक अमीनो एसिड प्रदान करता है। संयोजन आयरन, जिंक और बी विटामिन प्रदान करता है। यह एक संतोषजनक नाश्ता है जो आपको घंटों तक भरा हुआ रखता है।"
                    }
                },
                {
                    name: "Pancetta & Mushroom Thepla",
                    image: "img/thepla.jpg",
                    ingredients: {
                        en: [
                            "2 cups whole wheat flour",
                            "1 cup fresh fenugreek leaves (methi), finely chopped",
                            "100g pancetta, diced",
                            "1/2 cup mushrooms, chopped",
                            "1/2 cup yogurt",
                            "1 green chili, finely chopped",
                            "1 tsp ginger paste",
                            "1 tsp turmeric powder",
                            "1 tsp red chili powder",
                            "1 tsp cumin seeds",
                            "Salt to taste",
                            "Water as needed",
                            "Oil for cooking"
                        ],
                        hi: [
                            "2 कप गेहूं का आटा",
                            "1 कप ताजा मेथी के पत्ते, बारीक कटे हुए",
                            "100g पैनचेटा, कटा हुआ",
                            "1/2 कप मशरूम, कटा हुआ",
                            "1/2 कप दही",
                            "1 हरी मिर्च, बारीक कटी हुई",
                            "1 चम्मच अदरक पेस्ट",
                            "1 चम्मच हल्दी पाउडर",
                            "1 चम्मच लाल मिर्च पाउडर",
                            "1 चम्मच जीरा",
                            "नमक स्वादानुसार",
                            "आवश्यकतानुसार पानी",
                            "पकाने के लिए तेल"
                        ]
                    },
                    steps: {
                        en: [
                            "Cook pancetta in a pan until crispy. Remove and set aside, leaving fat in pan.",
                            "In the same pan, sauté mushrooms until golden. Set aside.",
                            "In a large bowl, mix flour, fenugreek leaves, pancetta, mushrooms, and all spices.",
                            "Add yogurt and mix well.",
                            "Add water gradually and knead into a soft dough.",
                            "Cover and rest for 15 minutes.",
                            "Divide dough into small balls.",
                            "Roll each ball into thin circles.",
                            "Heat a tawa and cook each thepla with oil until golden brown on both sides.",
                            "Serve hot with pickle or yogurt."
                        ],
                        hi: [
                            "पैनचेटा को कुरकुरा होने तक पकाएं। निकालकर अलग रख दें, पैन में चर्बी छोड़ दें।",
                            "उसी पैन में मशरूम को सुनहरा होने तक भूनें। अलग रख दें।",
                            "एक बड़े कटोरे में आटा, मेथी के पत्ते, पैनचेटा, मशरूम और सभी मसाले मिलाएं।",
                            "दही डालें और अच्छी तरह मिलाएं।",
                            "धीरे-धीरे पानी डालें और नरम आटा गूंथ लें।",
                            "ढककर 15 मिनट के लिए रख दें।",
                            "आटे को छोटी-छोटी लोइयों में बांटें।",
                            "प्रत्येक लोई को पतले गोलों में बेलें।",
                            "तवा गर्म करें और प्रत्येक थेपला को तेल डालकर दोनों तरफ सुनहरा होने तक पकाएं।",
                            "गर्मागर्म अचार या दही के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Methi thepla is rich in iron and fiber. Pancetta adds protein and savory flavor while mushrooms provide umami taste and nutrients. This sophisticated breakfast is perfect for adults.",
                        hi: "मेथी थेपला आयरन और फाइबर से भरपूर होता है। पैनचेटा प्रोटीन और दिलकश स्वाद जोड़ता है जबकि मशरूम उमामी स्वाद और पोषक तत्व प्रदान करते हैं। यह परिष्कृत नाश्ता वयस्कों के लिए परफेक्ट है।"
                    }
                },
                {
                    name: "Croissant Breakfast Sandwich",
                    image: "img/croissant.jpg",
                    ingredients: {
                        en: [
                            "2 croissants",
                            "4 slices bacon",
                            "2 eggs",
                            "2 slices cheddar cheese",
                            "1 avocado, sliced",
                            "1 tbsp mayonnaise",
                            "1 tsp Dijon mustard",
                            "Salt and pepper to taste",
                            "Optional: 1 tsp truffle oil"
                        ],
                        hi: [
                            "2 क्रोइसैन",
                            "4 स्लाइस बेकन",
                            "2 अंडे",
                            "2 स्लाइस चेडर चीज़",
                            "1 एवोकाडो, स्लाइस किया हुआ",
                            "1 बड़ा चम्मच मेयोनेज़",
                            "1 चम्मच डिजॉन सरसों",
                            "नमक और काली मिर्च स्वादानुसार",
                            "वैकल्पिक: 1 चम्मच ट्रफल ऑयल"
                        ]
                    },
                    steps: {
                        en: [
                            "Cook bacon in a pan until crispy. Drain on paper towels.",
                            "In the same pan, fry eggs to your liking. Season with salt and pepper.",
                            "Slice croissants in half and toast lightly.",
                            "Mix mayonnaise and Dijon mustard. Spread on croissant halves.",
                            "Layer bacon, egg, cheese, and avocado slices on bottom halves.",
                            "Drizzle with truffle oil if using.",
                            "Top with other croissant halves and serve immediately."
                        ],
                        hi: [
                            "बेकन को कुरकुरा होने तक पकाएं। पेपर टॉवल पर निकालें।",
                            "उसी पैन में, अपनी पसंद के अनुसार अंडे तलें। नमक और काली मिर्च के साथ सीज़न करें।",
                            "क्रोइसैन को आधा काटें और हल्का टोस्ट करें।",
                            "मेयोनेज़ और डिजॉन सरसों मिलाएं। क्रोइसैन हाफ पर फैलाएं।",
                            "नीचे के हिस्से पर बेकन, अंडा, चीज़ और एवोकाडो स्लाइस लेयर करें।",
                            "यदि उपयोग कर रहे हैं तो ट्रफल ऑयल डालें।",
                            "दूसरे क्रोइसैन हाफ से ढक दें और तुरंत परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Croissants provide carbohydrates for energy while bacon and eggs add protein. Avocado adds healthy fats and fiber. This gourmet breakfast sandwich is satisfying and delicious.",
                        hi: "क्रोइसैन ऊर्जा के लिए कार्बोहाइड्रेट प्रदान करते हैं जबकि बेकन और अंडे प्रोटीन जोड़ते हैं। एवोकाडो स्वस्थ वसा और फाइबर जोड़ता है। यह गोरमेट नाश्ता सैंडविच संतोषजनक और स्वादिष्ट है।"
                    }
                },
                {
                    name: "Shakshuka with Feta",
                    image: "img/feta.jpg",
                    ingredients: {
                        en: [
                            "2 tbsp olive oil",
                            "1 onion, chopped",
                            "1 red bell pepper, chopped",
                            "3 garlic cloves, minced",
                            "1 tsp cumin powder",
                            "1 tsp paprika",
                            "1/4 tsp chili flakes",
                            "400g canned tomatoes",
                            "4 eggs",
                            "100g feta cheese, crumbled",
                            "Fresh parsley, chopped",
                            "Salt and pepper to taste",
                            "Optional: 1/4 cup red wine"
                        ],
                        hi: [
                            "2 बड़े चम्मच ऑलिव ऑयल",
                            "1 प्याज, कटा हुआ",
                            "1 लाल शिमला मिर्च, कटा हुआ",
                            "3 लहसुन की कलियाँ, बारीक कटी हुई",
                            "1 चम्मच जीरा पाउडर",
                            "1 चम्मच पपरिका",
                            "1/4 चम्मच मिर्च फ्लेक्स",
                            "400g डिब्बाबंद टमाटर",
                            "4 अंडे",
                            "100g फेटा चीज़, क्रंबल किया हुआ",
                            "ताजा अजमोद, कटा हुआ",
                            "नमक और काली मिर्च स्वादानुसार",
                            "वैकल्पिक: 1/4 कप रेड वाइन"
                        ]
                    },
                    steps: {
                        en: [
                            "Heat olive oil in a skillet. Add onions and bell pepper. Sauté until soft.",
                            "Add garlic and spices. Cook for 1 minute.",
                            "Add red wine if using and cook until reduced by half.",
                            "Add canned tomatoes. Simmer for 10 minutes.",
                            "Make wells in the sauce and crack eggs into them.",
                            "Cover and cook until egg whites are set but yolks are still runny.",
                            "Sprinkle with feta cheese and parsley.",
                            "Season with salt and pepper. Serve hot with crusty bread."
                        ],
                        hi: [
                            "एक स्किलेट में ऑलिव ऑयल गर्म करें। प्याज और शिमला मिर्च डालें। नरम होने तक भूनें।",
                            "लहसुन और मसाले डालें। 1 मिनट तक पकाएं।",
                            "यदि उपयोग कर रहे हैं तो रेड वाइन डालें और आधा होने तक पकाएं।",
                            "डिब्बाबंद टमाटर डालें। 10 मिनट तक उबालें।",
                            "सॉस में कुएँ बनाएं और उनमें अंडे तोड़ें।",
                            "ढककर तब तक पकाएं जब तक अंडे की सफेदी सेट न हो जाए लेकिन जर्दी अभी भी रनिंग हो।",
                            "फेटा चीज़ और अजमोद छिड़कें।",
                            "नमक और काली मिर्च के साथ सीज़न करें। क्रस्टी ब्रेड के साथ गर्मागर्म परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Shakshuka provides protein from eggs and lycopene from tomatoes. Feta cheese adds calcium and probiotics. This Mediterranean-inspired dish is flavorful and satisfying.",
                        hi: "शकशुका अंडे से प्रोटीन और टमाटर से लाइकोपीन प्रदान करता है। फेटा चीज़ कैल्शियम और प्रोबायोटिक्स जोड़ता है। यह भूमध्यसागरीय से प्रेरित व्यंजन स्वादिष्ट और संतोषजनक है।"
                    }
                },
                {
                    name: "Chorizo & Potato Hash",
                    image: "img/hash.jpg",
                    ingredients: {
                        en: [
                            "2 potatoes, diced",
                            "200g chorizo, diced",
                            "1 onion, chopped",
                            "1 red bell pepper, chopped",
                            "2 garlic cloves, minced",
                            "1 tsp smoked paprika",
                            "4 eggs",
                            "2 tbsp olive oil",
                            "Salt and pepper to taste",
                            "Fresh parsley for garnish",
                            "Optional: 1/4 cup beer"
                        ],
                        hi: [
                            "2 आलू, कटा हुआ",
                            "200g चोरिज़ो, कटा हुआ",
                            "1 प्याज, कटा हुआ",
                            "1 लाल शिमला मिर्च, कटा हुआ",
                            "2 लहसुन की कलियाँ, बारीक कटी हुई",
                            "1 चम्मच स्मोक्ड पपरिका",
                            "4 अंडे",
                            "2 बड़े चम्मच ऑलिव ऑयल",
                            "नमक और काली मिर्च स्वादानुसार",
                            "ताजा अजमोद गार्निश के लिए",
                            "वैकल्पिक: 1/4 कप बीयर"
                        ]
                    },
                    steps: {
                        en: [
                            "Boil potatoes until tender. Drain and set aside.",
                            "Heat oil in a skillet. Add chorizo and cook until crispy.",
                            "Remove chorizo, leaving oil in pan.",
                            "Add onions and bell pepper. Sauté until soft.",
                            "Add garlic and smoked paprika. Cook for 1 minute.",
                            "Add beer if using and cook until reduced.",
                            "Add potatoes and cook until golden and crispy.",
                            "Return chorizo to pan. Mix well.",
                            "Make wells in the hash and crack eggs into them.",
                            "Cover and cook until eggs are done to your liking.",
                            "Garnish with parsley and serve hot."
                        ],
                        hi: [
                            "आलू को नरम होने तक उबालें। निथार कर अलग रख दें।",
                            "स्किलेट में तेल गर्म करें। चोरिज़ो डालें और कुरकुरा होने तक पकाएं।",
                            "चोरिज़ो निकालें, पैन में तेल छोड़ दें।",
                            "प्याज और शिमला मिर्च डालें। नरम होने तक भूनें।",
                            "लहसुन और स्मोक्ड पपरिका डालें। 1 मिनट तक पकाएं।",
                            "यदि उपयोग कर रहे हैं तो बीयर डालें और कम होने तक पकाएं।",
                            "आलू डालें और सुनहरा और कुरकुरा होने तक पकाएं।",
                            "चोरिज़ो को वापस पैन में डालें। अच्छी तरह मिलाएं।",
                            "हैश में कुएँ बनाएं और उनमें अंडे तोड़ें।",
                            "ढककर तब तक पकाएं जब तक अंडे आपकी पसंद के अनुसार न हो जाएँ।",
                            "अजमोद से गार्निश करें और गर्मागर्म परोसें।"
                        ]
                    },
                    benefits: {
                        en: "This hearty breakfast provides protein from chorizo and eggs. Potatoes add carbohydrates for energy. The smoked paprika adds antioxidants and depth of flavor.",
                        hi: "यह हार्दिक नाश्ता चोरिज़ो और अंडे से प्रोटीन प्रदान करता है। आलू ऊर्जा के लिए कार्बोहाइड्रेट जोड़ते हैं। स्मोक्ड पपरिका एंटीऑक्सिडेंट और स्वाद की गहराई जोड़ता है।"
                    }
                }
            ],
            lunch: [
                {
                    name: "Butter Chicken with Rum",
                    image: "img/butterchicken.jpg",
                    ingredients: {
                        en: [
                            "500g chicken, cubed",
                            "1 cup yogurt",
                            "2 tbsp ginger-garlic paste",
                            "1 tsp turmeric powder",
                            "2 tbsp butter",
                            "1 onion, chopped",
                            "3 tomatoes, pureed",
                            "1 tbsp kasuri methi",
                            "1/2 cup cream",
                            "2 tbsp rum",
                            "1 tsp garam masala",
                            "Salt to taste",
                            "Fresh coriander for garnish"
                        ],
                        hi: [
                            "500g चिकन, क्यूब्स में कटा हुआ",
                            "1 कप दही",
                            "2 बड़े चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच हल्दी पाउडर",
                            "2 बड़े चम्मच मक्खन",
                            "1 प्याज, कटा हुआ",
                            "3 टमाटर, प्यूरी किया हुआ",
                            "1 बड़ा चम्मच कसूरी मेथी",
                            "1/2 कप क्रीम",
                            "2 बड़े चम्मच रम",
                            "1 चम्मच गरम मसाला",
                            "नमक स्वादानुसार",
                            "ताजा धनिया गार्निश के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Marinate chicken in yogurt, ginger-garlic paste, turmeric and salt for 1 hour.",
                            "Grill or pan-fry chicken until cooked. Set aside.",
                            "Heat butter in a pan. Add onions and sauté until golden.",
                            "Add tomato puree and cook until oil separates.",
                            "Add rum and cook until alcohol evaporates.",
                            "Add cream, kasuri methi, and garam masala. Simmer for 5 minutes.",
                            "Add cooked chicken and simmer for 10 minutes.",
                            "Garnish with fresh coriander. Serve hot with naan."
                        ],
                        hi: [
                            "चिकन को दही, अदरक-लहसुन पेस्ट, हल्दी और नमक में 1 घंटे के लिए मैरिनेट करें।",
                            "चिकन को ग्रिल या पैन-फ्राई करें जब तक पक न जाए। अलग रख दें।",
                            "पैन में मक्खन गर्म करें। प्याज डालें और सुनहरा होने तक भूनें।",
                            "टमाटर प्यूरी डालें और तेल अलग होने तक पकाएं।",
                            "रम डालें और अल्कोहल वाष्पित होने तक पकाएं।",
                            "क्रीम, कसूरी मेथी और गरम मसाला डालें। 5 मिनट तक उबालें।",
                            "पका हुआ चिकन डालें और 10 मिनट तक उबालें।",
                            "ताजा धनिया से गार्निश करें। गर्मागर्म नान के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Butter chicken is rich in protein from chicken. The rum adds depth of flavor and helps tenderize the meat. This classic dish provides a satisfying and flavorful meal.",
                        hi: "बटर चिकन चिकन से प्रोटीन से भरपूर होता है। रम स्वाद की गहराई जोड़ता है और मांस को नरम करने में मदद करता है। यह क्लासिक डिश एक संतोषजनक और स्वादिष्ट भोजन प्रदान करती है।"
                    }
                },
                {
                    name: "Lamb Rogan Josh",
                    image: "img/rogan.jpg",
                    ingredients: {
                        en: [
                            "500g lamb, cubed",
                            "2 onions, finely chopped",
                            "2 tbsp ginger-garlic paste",
                            "1 cup yogurt",
                            "2 tbsp rogan josh masala",
                            "1/2 cup red wine",
                            "1/4 cup oil",
                            "2 tbsp ghee",
                            "1 tsp fennel seeds",
                            "4 cloves",
                            "2 cardamom pods",
                            "1-inch cinnamon stick",
                            "Salt to taste",
                            "Fresh coriander for garnish"
                        ],
                        hi: [
                            "500g मटन, क्यूब्स में कटा हुआ",
                            "2 प्याज, बारीक कटा हुआ",
                            "2 बड़े चम्मच अदरक-लहसुन पेस्ट",
                            "1 कप दही",
                            "2 बड़े चम्मच रोगन जोश मसाला",
                            "1/2 कप रेड वाइन",
                            "1/4 कप तेल",
                            "2 बड़े चम्मच घी",
                            "1 चम्मच सौंफ के दाने",
                            "4 लौंग",
                            "2 इलायची",
                            "1 इंच दालचीनी का टुकड़ा",
                            "नमक स्वादानुसार",
                            "ताजा धनिया गार्निश के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Heat oil and ghee in a pressure cooker. Add whole spices and sauté until fragrant.",
                            "Add onions and sauté until golden brown.",
                            "Add ginger-garlic paste and sauté for 2 minutes.",
                            "Add lamb and sear on all sides.",
                            "Add rogan josh masala and salt. Cook for 2 minutes.",
                            "Add red wine and cook until reduced by half.",
                            "Add yogurt and mix well.",
                            "Pressure cook for 5-6 whistles until lamb is tender.",
                            "Garnish with fresh coriander. Serve hot with rice or naan."
                        ],
                        hi: [
                            "प्रेशर कुकर में तेल और घी गर्म करें। साबुत मसाले डालें और सुगंध आने तक भूनें।",
                            "प्याज डालें और सुनहरा भूरा होने तक भूनें।",
                            "अदरक-लहसुन पेस्ट डालें और 2 मिनट तक भूनें।",
                            "मटन डालें और सभी तरफ से सील करें।",
                            "रोगन जोश मसाला और नमक डालें। 2 मिनट तक पकाएं।",
                            "रेड वाइन डालें और आधा होने तक पकाएं।",
                            "दही डालें और अच्छी तरह मिलाएं।",
                            "मटन नरम होने तक 5-6 सीटी आने तक प्रेशर कुक करें।",
                            "ताजा धनिया से गार्निश करें। गर्मागर्म चावल या नान के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Lamb is rich in protein and iron. The red wine adds depth of flavor and antioxidants. This aromatic dish is satisfying and perfect for special occasions.",
                        hi: "मटन प्रोटीन और आयरन से भरपूर होता है। रेड वाइन स्वाद की गहराई और एंटीऑक्सिडेंट जोड़ती है। यह सुगंधित व्यंजन संतोषजनक है और विशेष अवसरों के लिए परफेक्ट है।"
                    }
                },
                {
                    name: "Beer-Battered Fish Curry",
                    image: "img/fishcurry.jpg",
                    ingredients: {
                        en: [
                            "500g white fish fillets",
                            "1 cup beer",
                            "1 cup flour",
                            "1 tsp baking powder",
                            "1 tsp turmeric powder",
                            "Salt to taste",
                            "For curry:",
                            "1 onion, chopped",
                            "2 tomatoes, pureed",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp mustard seeds",
                            "1 tsp turmeric powder",
                            "1 tbsp coriander powder",
                            "1 tsp red chili powder",
                            "1/2 cup coconut milk",
                            "2 tbsp oil",
                            "Fresh coriander for garnish"
                        ],
                        hi: [
                            "500g सफेद मछली फिलेट",
                            "1 कप बीयर",
                            "1 कप मैदा",
                            "1 चम्मच बेकिंग पाउडर",
                            "1 चम्मच हल्दी पाउडर",
                            "नमक स्वादानुसार",
                            "करी के लिए:",
                            "1 प्याज, कटा हुआ",
                            "2 टमाटर, प्यूरी किया हुआ",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच राई के दाने",
                            "1 चम्मच हल्दी पाउडर",
                            "1 बड़ा चम्मच धनिया पाउडर",
                            "1 चम्मच लाल मिर्च पाउडर",
                            "1/2 कप नारियल का दूध",
                            "2 बड़े चम्मच तेल",
                            "ताजा धनिया गार्निश के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Mix flour, baking powder, turmeric, salt, and beer to make batter.",
                            "Dip fish fillets in batter and deep fry until golden. Set aside.",
                            "For curry: Heat oil in a pan. Add mustard seeds and let them splutter.",
                            "Add onions and sauté until golden.",
                            "Add ginger-garlic paste and sauté for 2 minutes.",
                            "Add tomato puree and cook until oil separates.",
                            "Add spices and coconut milk. Simmer for 10 minutes.",
                            "Add fried fish and simmer for 5 minutes.",
                            "Garnish with fresh coriander. Serve hot with rice."
                        ],
                        hi: [
                            "बैटर बनाने के लिए मैदा, बेकिंग पाउडर, हल्दी, नमक और बीयर मिलाएं।",
                            "मछली के फिलेट को बैटर में डुबोएं और सुनहरा होने तक डीप फ्राई करें। अलग रख दें।",
                            "करी के लिए: पैन में तेल गर्म करें। राई डालें और चटकने दें।",
                            "प्याज डालें और सुनहरा होने तक भूनें।",
                            "अदरक-लहसुन पेस्ट डालें और 2 मिनट तक भूनें।",
                            "टमाटर प्यूरी डालें और तेल अलग होने तक पकाएं।",
                            "मसाले और नारियल का दूध डालें। 10 मिनट तक उबालें।",
                            "तली हुई मछली डालें और 5 मिनट तक उबालें।",
                            "ताजा धनिया से गार्निश करें। गर्मागर्म चावल के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Fish is rich in omega-3 fatty acids and protein. The beer batter adds a light and crispy texture. This flavorful dish is both nutritious and satisfying.",
                        hi: "मछली ओमेगा-3 फैटी एसिड और प्रोटीन से भरपूर होती है। बीयर बैटर हल्की और कुरकुरी बनावट जोड़ता है। यह स्वादिष्ट व्यंजन पौष्टिक और संतोषजनक दोनों है।"
                    }
                },
                {
                    name: "Pork Vindaloo",
                    image: "img/pork.jpg",
                    ingredients: {
                        en: [
                            "500g pork, cubed",
                            "2 onions, chopped",
                            "4 garlic cloves",
                            "1-inch ginger",
                            "4 dried red chilies",
                            "1 tsp cumin seeds",
                            "1 tsp mustard seeds",
                            "1 tsp turmeric powder",
                            "2 tbsp vinegar",
                            "1/4 cup red wine",
                            "2 tbsp oil",
                            "Salt to taste",
                            "Fresh coriander for garnish"
                        ],
                        hi: [
                            "500g पोर्क, क्यूब्स में कटा हुआ",
                            "2 प्याज, कटा हुआ",
                            "4 लहसुन की कलियाँ",
                            "1 इंच अदरक",
                            "4 सूखी लाल मिर्च",
                            "1 चम्मच जीरा",
                            "1 चम्मच राई के दाने",
                            "1 चम्मच हल्दी पाउडर",
                            "2 बड़े चम्मच सिरका",
                            "1/4 कप रेड वाइन",
                            "2 बड़े चम्मच तेल",
                            "नमक स्वादानुसार",
                            "ताजा धनिया गार्निश के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Make paste of onions, garlic, ginger, red chilies, cumin, mustard, and vinegar.",
                            "Marinate pork in the paste for 2 hours.",
                            "Heat oil in a pan. Add marinated pork and sear on all sides.",
                            "Add red wine and cook until reduced by half.",
                            "Add water, cover and simmer for 45 minutes or until pork is tender.",
                            "Garnish with fresh coriander. Serve hot with rice or bread."
                        ],
                        hi: [
                            "प्याज, लहसुन, अदरक, लाल मिर्च, जीरा, राई और सिरका का पेस्ट बनाएं।",
                            "पोर्क को पेस्ट में 2 घंटे के लिए मैरिनेट करें।",
                            "पैन में तेल गर्म करें। मैरिनेट किया हुआ पोर्क डालें और सभी तरफ से सील करें।",
                            "रेड वाइन डालें और आधा होने तक पकाएं।",
                            "पानी डालें, ढककर 45 मिनट तक उबालें या जब तक पोर्क नरम न हो जाए।",
                            "ताजा धनिया से गार्निश करें। गर्मागर्म चावल या ब्रेड के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Pork is rich in protein and B vitamins. The vinegar and wine help tenderize the meat and add depth of flavor. This spicy dish is perfect for those who enjoy bold flavors.",
                        hi: "पोर्क प्रोटीन और बी विटामिन से भरपूर होता है। सिरका और वाइन मांस को नरम करने में मदद करते हैं और स्वाद की गहराई जोड़ते हैं। यह मसालेदार व्यंजन उन लोगों के लिए परफेक्ट है जो बोल्ड फ्लेवर पसंद करते हैं।"
                    }
                },
                {
                    name: "Duck Biryani",
                    image: "img/duck.jpg",
                    ingredients: {
                        en: [
                            "500g duck, cut into pieces",
                            "2 cups basmati rice",
                            "1 cup yogurt",
                            "2 onions, sliced",
                            "2 tomatoes, chopped",
                            "1/4 cup mint leaves",
                            "1/4 cup coriander leaves",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp biryani masala",
                            "1/2 cup red wine",
                            "4 cloves",
                            "2 cardamom pods",
                            "1-inch cinnamon stick",
                            "Saffron strands in milk",
                            "2 tbsp ghee",
                            "Salt to taste"
                        ],
                        hi: [
                            "500g बत्तख, टुकड़ों में कटा हुआ",
                            "2 कप बासमती चावल",
                            "1 कप दही",
                            "2 प्याज, कटा हुआ",
                            "2 टमाटर, कटा हुआ",
                            "1/4 कप पुदीना पत्तियां",
                            "1/4 कप धनिया पत्तियां",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच बिरयानी मसाला",
                            "1/2 कप रेड वाइन",
                            "4 लौंग",
                            "2 इलायची",
                            "1 इंच दालचीनी का टुकड़ा",
                            "दूध में केसर के तार",
                            "2 बड़े चम्मच घी",
                            "नमक स्वादानुसार"
                        ]
                    },
                    steps: {
                        en: [
                            "Marinate duck in yogurt, ginger-garlic paste, biryani masala, and salt for 2 hours.",
                            "Soak rice for 30 minutes. Parboil and drain.",
                            "Heat ghee in a pan. Add whole spices and onions. Sauté until golden.",
                            "Add marinated duck and sear on all sides.",
                            "Add red wine and cook until reduced by half.",
                            "Add tomatoes and cook until soft.",
                            "Layer rice and duck mixture in a heavy-bottomed pot.",
                            "Sprinkle saffron milk and herbs.",
                            "Cover and cook on low heat for 45 minutes.",
                            "Serve hot with raita."
                        ],
                        hi: [
                            "बत्तख को दही, अदरक-लहसुन पेस्ट, बिरयानी मसाला और नमक में 2 घंटे के लिए मैरिनेट करें।",
                            "चावल को 30 मिनट के लिए भिगोएँ। अधपका करके निथार लें।",
                            "पैन में घी गर्म करें। साबुत मसाले और प्याज डालें। सुनहरा होने तक भूनें।",
                            "मैरिनेट किया हुआ बत्तख डालें और सभी तरफ से सील करें।",
                            "रेड वाइन डालें और आधा होने तक पकाएं।",
                            "टमाटर डालें और नरम होने तक पकाएं।",
                            "एक भारी तले वाले बर्तन में चावल और बत्तख का मिश्रण लेयर करें।",
                            "केसर का दूध और जड़ी-बूटियां छिड़कें।",
                            "ढककर धीमी आंच पर 45 मिनट तक पकाएं।",
                            "गर्मागर्म रायते के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Duck is rich in protein and iron. The red wine adds complexity to the flavor profile. This luxurious biryani is perfect for special occasions and gatherings.",
                        hi: "बत्तख प्रोटीन और आयरन से भरपूर होती है। रेड वाइन स्वाद प्रोफ़ाइल में जटिलता जोड़ती है। यह शानदार बिरयानी विशेष अवसरों और सभाओं के लिए परफेक्ट है।"
                    }
                },
                {
                    name: "Beef Pepper Fry",
                    image: "img/pepperfry.jpg",
                    ingredients: {
                        en: [
                            "500g beef, cubed",
                            "2 onions, sliced",
                            "1 tbsp ginger-garlic paste",
                            "2 tbsp crushed black pepper",
                            "1 tbsp soy sauce",
                            "1 tbsp Worcestershire sauce",
                            "1/4 cup brandy",
                            "2 green chilies, slit",
                            "8-10 curry leaves",
                            "1/2 tsp turmeric powder",
                            "2 tbsp oil",
                            "Salt to taste",
                            "Fresh coriander for garnish"
                        ],
                        hi: [
                            "500g बीफ, क्यूब्स में कटा हुआ",
                            "2 प्याज, कटा हुआ",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "2 बड़े चम्मच कुटी काली मिर्च",
                            "1 बड़ा चम्मच सोया सॉस",
                            "1 बड़ा चम्मच वर्सेस्टरशायर सॉस",
                            "1/4 कप ब्रांडी",
                            "2 हरी मिर्च, चीरी हुई",
                            "8-10 करी पत्ते",
                            "1/2 चम्मच हल्दी पाउडर",
                            "2 बड़े चम्मच तेल",
                            "नमक स्वादानुसार",
                            "ताजा धनिया गार्निश के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Marinate beef in ginger-garlic paste, turmeric, and salt for 1 hour.",
                            "Pressure cook beef until tender. Drain and set aside.",
                            "Heat oil in a pan. Add curry leaves and green chilies.",
                            "Add onions and sauté until golden.",
                            "Add cooked beef and sear on high heat.",
                            "Add soy sauce, Worcestershire sauce, and black pepper. Mix well.",
                            "Add brandy and flambé (optional).",
                            "Cook until sauce thickens.",
                            "Garnish with fresh coriander. Serve hot with appam or rice."
                        ],
                        hi: [
                            "बीफ को अदरक-लहसुन पेस्ट, हल्दी और नमक में 1 घंटे के लिए मैरिनेट करें।",
                            "बीफ को नरम होने तक प्रेशर कुक करें। निथार कर अलग रख दें।",
                            "पैन में तेल गर्म करें। करी पत्ते और हरी मिर्च डालें।",
                            "प्याज डालें और सुनहरा होने तक भूनें।",
                            "पका हुआ बीफ डालें और तेज आंच पर सील करें।",
                            "सोया सॉस, वर्सेस्टरशायर सॉस और काली मिर्च डालें। अच्छी तरह मिलाएं।",
                            "ब्रांडी डालें और फ्लैम्बे करें (वैकल्पिक)।",
                            "सॉस गाढ़ा होने तक पकाएं।",
                            "ताजा धनिया से गार्निश करें। गर्मागर्म अप्पम या चावल के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Beef is rich in protein and iron. The black pepper adds antioxidants and aids digestion. The brandy adds depth of flavor. This spicy dish is perfect with rice or bread.",
                        hi: "बीफ प्रोटीन और आयरन से भरपूर होता है। काली मिर्च एंटीऑक्सिडेंट जोड़ती है और पाचन में सहायता करती है। ब्रांडी स्वाद की गहराई जोड़ती है। यह मसालेदार व्यंजन चावल या ब्रेड के साथ परफेक्ट है।"
                    }
                },
                {
                    name: "Chicken 65 with Whiskey Glaze",
                    image: "img/chicken.jpg",
                    ingredients: {
                        en: [
                            "500g chicken, boneless cubes",
                            "1 cup yogurt",
                            "2 tbsp ginger-garlic paste",
                            "1 tsp turmeric powder",
                            "1 tsp red chili powder",
                            "1 tsp garam masala",
                            "2 tbsp cornflour",
                            "2 tbsp whiskey",
                            "1 tbsp honey",
                            "1 tsp soy sauce",
                            "Oil for frying",
                            "Salt to taste",
                            "Fresh curry leaves for garnish"
                        ],
                        hi: [
                            "500g चिकन, बोनलेस क्यूब्स",
                            "1 कप दही",
                            "2 बड़े चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच हल्दी पाउडर",
                            "1 चम्मच लाल मिर्च पाउडर",
                            "1 चम्मच गरम मसाला",
                            "2 बड़े चम्मच कॉर्नफ्लोर",
                            "2 बड़े चम्मच व्हिस्की",
                            "1 बड़ा चम्मच शहद",
                            "1 चम्मच सोया सॉस",
                            "तलने के लिए तेल",
                            "नमक स्वादानुसार",
                            "गार्निश के लिए ताजा करी पत्ते"
                        ]
                    },
                    steps: {
                        en: [
                            "Marinate chicken in yogurt, ginger-garlic paste, turmeric, red chili powder, garam masala, cornflour, and salt for 2 hours.",
                            "Deep fry chicken until golden and cooked through. Drain on paper towels.",
                            "In a pan, mix whiskey, honey, and soy sauce. Bring to simmer.",
                            "Add fried chicken and toss to coat with glaze.",
                            "Garnish with fried curry leaves. Serve hot."
                        ],
                        hi: [
                            "चिकन को दही, अदरक-लहसुन पेस्ट, हल्दी, लाल मिर्च पाउडर, गरम मसाला, कॉर्नफ्लोर और नमक में 2 घंटे के लिए मैरिनेट करें।",
                            "चिकन को सुनहरा और पूरी तरह पकने तक डीप फ्राई करें। पेपर टॉवल पर निकालें।",
                            "एक पैन में व्हिस्की, शहद और सोया सॉस मिलाएं। उबाल लें।",
                            "तला हुआ चिकन डालें और ग्लेज़ के साथ कोट करने के लिए टॉस करें।",
                            "तली हुई करी पत्तियों से गार्निश करें। गर्मागर्म परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Chicken 65 is a popular appetizer rich in protein. The whiskey glaze adds a sophisticated flavor profile. This dish is perfect as a starter or with drinks.",
                        hi: "चिकन 65 एक लोकप्रिय ऐपेटाइज़र है जो प्रोटीन से भरपूर है। व्हिस्की ग्लेज़ एक परिष्कृत स्वाद प्रोफ़ाइल जोड़ता है। यह व्यंजन स्टार्टर या ड्रिंक्स के साथ परफेक्ट है।"
                    }
                },
                {
                    name: "Goan Prawn Curry",
                    image: "img/prawn.jpg",
                    ingredients: {
                        en: [
                            "500g prawns, cleaned",
                            "1 onion, chopped",
                            "2 tomatoes, chopped",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp mustard seeds",
                            "1 tsp turmeric powder",
                            "1 tbsp coriander powder",
                            "1 tsp red chili powder",
                            "1/2 cup coconut milk",
                            "2 tbsp coconut vinegar",
                            "1/4 cup feni (cashew liquor)",
                            "2 tbsp oil",
                            "Salt to taste",
                            "Fresh coriander for garnish"
                        ],
                        hi: [
                            "500g झींगे, साफ किए हुए",
                            "1 प्याज, कटा हुआ",
                            "2 टमाटर, कटा हुआ",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच राई के दाने",
                            "1 चम्मच हल्दी पाउडर",
                            "1 बड़ा चम्मच धनिया पाउडर",
                            "1 चम्मच लाल मिर्च पाउडर",
                            "1/2 कप नारियल का दूध",
                            "2 बड़े चम्मच नारियल सिरका",
                            "1/4 कप फेनी (काजू शराब)",
                            "2 बड़े चम्मच तेल",
                            "नमक स्वादानुसार",
                            "ताजा धनिया गार्निश के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Heat oil in a pan. Add mustard seeds and let them splutter.",
                            "Add onions and sauté until golden.",
                            "Add ginger-garlic paste and sauté for 2 minutes.",
                            "Add tomatoes and cook until soft.",
                            "Add spices and salt. Cook for 2 minutes.",
                            "Add coconut milk and bring to simmer.",
                            "Add prawns and cook for 5 minutes.",
                            "Add coconut vinegar and feni. Cook for 2 minutes.",
                            "Garnish with fresh coriander. Serve hot with rice."
                        ],
                        hi: [
                            "पैन में तेल गर्म करें। राई डालें और चटकने दें।",
                            "प्याज डालें और सुनहरा होने तक भूनें।",
                            "अदरक-लहसुन पेस्ट डालें और 2 मिनट तक भूनें।",
                            "टमाटर डालें और नरम होने तक पकाएं।",
                            "मसाले और नमक डालें। 2 मिनट तक पकाएं।",
                            "नारियल का दूध डालें और उबाल लें।",
                            "झींगे डालें और 5 मिनट तक पकाएं।",
                            "नारियल सिरका और फेनी डालें। 2 मिनट तक पकाएं।",
                            "ताजा धनिया से गार्निश करें। गर्मागर्म चावल के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Prawns are rich in protein and low in fat. The coconut milk adds healthy fats while feni adds authentic Goan flavor. This coastal dish is flavorful and aromatic.",
                        hi: "झींगे प्रोटीन से भरपूर और वसा में कम होते हैं। नारियल का दूध स्वस्थ वसा जोड़ता है जबकि फेनी प्रामाणिक गोवा स्वाद जोड़ती है। यह तटीय व्यंजन स्वादिष्ट और सुगंधित है।"
                    }
                },
                {
                    name: "Mutton Do Pyaza",
                    image: "img/mutton.jpg",
                    ingredients: {
                        en: [
                            "500g mutton, cubed",
                            "3 onions, sliced (2 for curry, 1 for garnish)",
                            "2 tomatoes, chopped",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp turmeric powder",
                            "1 tbsp coriander powder",
                            "1 tsp garam masala",
                            "1/4 cup whiskey",
                            "2 tbsp ghee",
                            "Salt to taste",
                            "Fresh coriander for garnish"
                        ],
                        hi: [
                            "500g मटन, क्यूब्स में कटा हुआ",
                            "3 प्याज, कटा हुआ (2 करी के लिए, 1 गार्निश के लिए)",
                            "2 टमाटर, कटा हुआ",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच हल्दी पाउडर",
                            "1 बड़ा चम्मच धनिया पाउडर",
                            "1 चम्मच गरम मसाला",
                            "1/4 कप व्हिस्की",
                            "2 बड़े चम्मच घी",
                            "नमक स्वादानुसार",
                            "ताजा धनिया गार्निश के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Heat ghee in a pressure cooker. Add 2 sliced onions and sauté until golden.",
                            "Add ginger-garlic paste and sauté for 2 minutes.",
                            "Add mutton and sear on all sides.",
                            "Add whiskey and cook until alcohol evaporates.",
                            "Add tomatoes and cook until soft.",
                            "Add spices and salt. Mix well.",
                            "Pressure cook for 5-6 whistles or until mutton is tender.",
                            "In a separate pan, fry remaining onion slices until crispy.",
                            "Garnish mutton curry with fried onions and fresh coriander.",
                            "Serve hot with naan or rice."
                        ],
                        hi: [
                            "प्रेशर कुकर में घी गर्म करें। 2 कटा हुआ प्याज डालें और सुनहरा होने तक भूनें।",
                            "अदरक-लहसुन पेस्ट डालें और 2 मिनट तक भूनें।",
                            "मटन डालें और सभी तरफ से सील करें।",
                            "व्हिस्की डालें और अल्कोहल वाष्पित होने तक पकाएं।",
                            "टमाटर डालें और नरम होने तक पकाएं।",
                            "मसाले और नमक डालें। अच्छी तरह मिलाएं।",
                            "मटन नरम होने तक 5-6 सीटी आने तक प्रेशर कुक करें।",
                            "एक अलग पैन में, बचे हुए प्याज के स्लाइस को कुरकुरा होने तक तलें।",
                            "मटन करी को तले हुए प्याज और ताजा धनिया से गार्निश करें।",
                            "गर्मागर्म नान या चावल के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Mutton is rich in protein and iron. The whiskey adds depth of flavor and helps tenderize the meat. This aromatic dish is satisfying and perfect with bread or rice.",
                        hi: "मटन प्रोटीन और आयरन से भरपूर होता है। व्हिस्की स्वाद की गहराई जोड़ती है और मांस को नरम करने में मदद करती है। यह सुगंधित व्यंजन संतोषजनक है और ब्रेड या चावल के साथ परफेक्ट है।"
                    }
                },
                {
                    name: "Chicken Chettinad",
                    image: "img/chickenchettinad.jpg",
                    ingredients: {
                        en: [
                            "500g chicken, cut into pieces",
                            "2 onions, chopped",
                            "2 tomatoes, chopped",
                            "1 tbsp ginger-garlic paste",
                            "2 tbsp chettinad masala",
                            "1/2 cup coconut milk",
                            "1/4 cup brandy",
                            "2 tbsp oil",
                            "Salt to taste",
                            "Fresh coriander for garnish"
                        ],
                        hi: [
                            "500g चिकन, टुकड़ों में कटा हुआ",
                            "2 प्याज, कटा हुआ",
                            "2 टमाटर, कटा हुआ",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "2 बड़े चम्मच चेट्टीनाड मसाला",
                            "1/2 कप नारियल का दूध",
                            "1/4 कप ब्रांडी",
                            "2 बड़े चम्मच तेल",
                            "नमक स्वादानुसार",
                            "ताजा धनिया गार्निश के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Heat oil in a pan. Add onions and sauté until golden.",
                            "Add ginger-garlic paste and sauté for 2 minutes.",
                            "Add tomatoes and cook until soft.",
                            "Add chettinad masala and salt. Cook for 2 minutes.",
                            "Add chicken and sear on all sides.",
                            "Add brandy and cook until alcohol evaporates.",
                            "Add coconut milk and simmer for 20 minutes or until chicken is cooked.",
                            "Garnish with fresh coriander. Serve hot with appam or rice."
                        ],
                        hi: [
                            "पैन में तेल गर्म करें। प्याज डालें और सुनहरा होने तक भूनें।",
                            "अदरक-लहसुन पेस्ट डालें और 2 मिनट तक भूनें।",
                            "टमाटर डालें और नरम होने तक पकाएं।",
                            "चेट्टीनाड मसाला और नमक डालें। 2 मिनट तक पकाएं।",
                            "चिकन डालें और सभी तरफ से सील करें।",
                            "ब्रांडी डालें और अल्कोहल वाष्पित होने तक पकाएं।",
                            "नारियल का दूध डालें और 20 मिनट तक उबालें या जब तक चिकन पक न जाए।",
                            "ताजा धनिया से गार्निश करें। गर्मागर्म अप्पम या चावल के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Chicken Chettinad is rich in protein and spices. The brandy adds depth to the flavor while coconut milk adds creaminess. This aromatic dish is perfect with South Indian breads.",
                        hi: "चिकन चेट्टीनाड प्रोटीन और मसालों से भरपूर होता है। ब्रांडी स्वाद में गहराई जोड़ती है जबकि नारियल का दूध क्रीमिनेस जोड़ता है। यह सुगंधित व्यंजन दक्षिण भारतीय ब्रेड्स के साथ परफेक्ट है।"
                    }
                }
            ],
            snacks: [
                {
                    name: "Whiskey-Glazed Chicken Wings",
                    image: "img/wraps.jpg",
                    ingredients: {
                        en: [
                            "12 chicken wings",
                            "1/4 cup soy sauce",
                            "2 tbsp honey",
                            "2 tbsp whiskey",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp red chili flakes",
                            "1 tbsp sesame seeds",
                            "2 tbsp oil",
                            "Salt to taste",
                            "Green onions for garnish"
                        ],
                        hi: [
                            "12 चिकन विंग्स",
                            "1/4 कप सोया सॉस",
                            "2 बड़े चम्मच शहद",
                            "2 बड़े चम्मच व्हिस्की",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच लाल मिर्च फ्लेक्स",
                            "1 बड़ा चम्मच तिल",
                            "2 बड़े चम्मच तेल",
                            "नमक स्वादानुसार",
                            "गार्निश के लिए हरा प्याज"
                        ]
                    },
                    steps: {
                        en: [
                            "Marinate chicken wings in soy sauce, ginger-garlic paste, and salt for 1 hour.",
                            "Preheat oven to 200°C (400°F).",
                            "Place wings on a baking tray and bake for 25 minutes.",
                            "In a saucepan, mix honey, whiskey, and chili flakes. Simmer for 5 minutes.",
                            "Brush wings with whiskey glaze and bake for another 10 minutes.",
                            "Garnish with sesame seeds and green onions.",
                            "Serve hot with blue cheese dip."
                        ],
                        hi: [
                            "चिकन विंग्स को सोया सॉस, अदरक-लहसुन पेस्ट और नमक में 1 घंटे के लिए मैरिनेट करें।",
                            "ओवन को 200°C (400°F) पर प्रीहीट करें।",
                            "विंग्स को बेकिंग ट्रे पर रखें और 25 मिनट तक बेक करें।",
                            "एक सॉस पैन में शहद, व्हिस्की और मिर्च फ्लेक्स मिलाएं। 5 मिनट तक उबालें।",
                            "विंग्स पर व्हिस्की ग्लेज़ ब्रश करें और 10 मिनट तक बेक करें।",
                            "तिल और हरे प्याज से गार्निश करें।",
                            "ब्लू चीज़ डिप के साथ गर्मागर्म परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Chicken wings provide protein while the whiskey glaze adds a sophisticated flavor. This snack is perfect for game nights or as an appetizer with drinks.",
                        hi: "चिकन विंग्स प्रोटीन प्रदान करते हैं जबकि व्हिस्की ग्लेज़ एक परिष्कृत स्वाद जोड़ता है। यह स्नैक गेम नाइट्स या ड्रिंक्स के साथ ऐपेटाइज़र के रूप में परफेक्ट है।"
                    }
                },
                {
                    name: "Beef Sliders with Caramelized Onions",
                    image: "img/sliders.jpg",
                    ingredients: {
                        en: [
                            "500g ground beef",
                            "1 onion, finely chopped",
                            "1 egg",
                            "1/4 cup breadcrumbs",
                            "1 tsp Worcestershire sauce",
                            "1 tbsp whiskey",
                            "Salt and pepper to taste",
                            "For caramelized onions:",
                            "2 onions, sliced",
                            "2 tbsp butter",
                            "1 tbsp brown sugar",
                            "2 tbsp red wine",
                            "12 slider buns",
                            "6 slices cheddar cheese"
                        ],
                        hi: [
                            "500g कीमा बना हुआ बीफ",
                            "1 प्याज, बारीक कटा हुआ",
                            "1 अंडा",
                            "1/4 कप ब्रेडक्रम्ब्स",
                            "1 चम्मच वर्सेस्टरशायर सॉस",
                            "1 बड़ा चम्मच व्हिस्की",
                            "नमक और काली मिर्च स्वादानुसार",
                            "कैरमलाइज्ड प्याज के लिए:",
                            "2 प्याज, कटा हुआ",
                            "2 बड़े चम्मच मक्खन",
                            "1 बड़ा चम्मच ब्राउन शुगर",
                            "2 बड़े चम्मच रेड वाइन",
                            "12 स्लाइडर बन",
                            "6 स्लाइस चेडर चीज़"
                        ]
                    },
                    steps: {
                        en: [
                            "Mix ground beef, onion, egg, breadcrumbs, Worcestershire sauce, whiskey, salt, and pepper.",
                            "Form into small patties and refrigerate for 30 minutes.",
                            "For caramelized onions: Melt butter in a pan. Add onions and cook on low heat for 20 minutes.",
                            "Add brown sugar and red wine. Cook until caramelized.",
                            "Cook patties on a grill or pan until done to your liking.",
                            "Place cheese on patties to melt.",
                            "Assemble sliders with patties, caramelized onions, and buns.",
                            "Serve hot with pickles."
                        ],
                        hi: [
                            "कीमा बना हुआ बीफ, प्याज, अंडा, ब्रेडक्रम्ब्स, वर्सेस्टरशायर सॉस, व्हिस्की, नमक और काली मिर्च मिलाएं।",
                            "छोटे पैटी बनाएं और 30 मिनट के लिए फ्रिज में रख दें।",
                            "कैरमलाइज्ड प्याज के लिए: पैन में मक्खन पिघलाएं। प्याज डालें और 20 मिनट तक धीमी आंच पर पकाएं।",
                            "ब्राउन शुगर और रेड वाइन डालें। कैरमलाइज होने तक पकाएं।",
                            "ग्रिल या पैन पर पैटी को अपनी पसंद के अनुसार पकाएं।",
                            "पैटी पर चीज़ रखें ताकि पिघल जाए।",
                            "पैटी, कैरमलाइज्ड प्याज और बन के साथ स्लाइडर असेंबल करें।",
                            "अचार के साथ गर्मागर्म परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Beef sliders provide protein and iron. The caramelized onions add sweetness and depth of flavor. These mini burgers are perfect for parties and gatherings.",
                        hi: "बीफ स्लाइडर प्रोटीन और आयरन प्रदान करते हैं। कैरमलाइज्ड प्याज मिठास और स्वाद की गहराई जोड़ते हैं। ये मिनी बर्गर पार्टियों और सभाओं के लिए परफेक्ट हैं।"
                    }
                },
                {
                    name: "Rum-Glazed Pork Ribs",
                    image: "img/porkribs.jpg",
                    ingredients: {
                        en: [
                            "1 kg pork ribs",
                            "1/4 cup soy sauce",
                            "2 tbsp honey",
                            "3 tbsp rum",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp five-spice powder",
                            "1 tsp smoked paprika",
                            "Salt and pepper to taste"
                        ],
                        hi: [
                            "1 किलो पोर्क रिब्स",
                            "1/4 कप सोया सॉस",
                            "2 बड़े चम्मच शहद",
                            "3 बड़े चम्मच रम",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच फाइव-स्पाइस पाउडर",
                            "1 चम्मच स्मोक्ड पपरिका",
                            "नमक और काली मिर्च स्वादानुसार"
                        ]
                    },
                    steps: {
                        en: [
                            "Mix soy sauce, honey, rum, ginger-garlic paste, five-spice powder, paprika, salt, and pepper.",
                            "Marinate ribs in the mixture for 4 hours or overnight.",
                            "Preheat oven to 160°C (325°F).",
                            "Place ribs on a baking tray and cover with foil.",
                            "Bake for 2 hours.",
                            "Remove foil, increase temperature to 200°C (400°F), and bake for 15 minutes.",
                            "Brush with extra marinade and bake for another 10 minutes.",
                            "Serve hot with coleslaw."
                        ],
                        hi: [
                            "सोया सॉस, शहद, रम, अदरक-लहसुन पेस्ट, फाइव-स्पाइस पाउडर, पपरिका, नमक और काली मिर्च मिलाएं।",
                            "रिब्स को मिश्रण में 4 घंटे या रात भर मैरिनेट करें।",
                            "ओवन को 160°C (325°F) पर प्रीहीट करें।",
                            "रिब्स को बेकिंग ट्रे पर रखें और फॉयल से ढक दें।",
                            "2 घंटे तक बेक करें।",
                            "फॉयल हटाएं, तापमान 200°C (400°F) तक बढ़ाएं, और 15 मिनट तक बेक करें।",
                            "अतिरिक्त मैरिनेड ब्रश करें और 10 मिनट तक बेक करें।",
                            "कोलस्लॉ के साथ गर्मागर्म परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Pork ribs are rich in protein and flavor. The rum glaze adds sweetness and depth. These tender ribs are perfect for barbecue parties and gatherings.",
                        hi: "पोर्क रिब्स प्रोटीन और स्वाद से भरपूर होती हैं। रम ग्लेज़ मिठास और गहराई जोड़ता है। ये नरम रिब्स बारबेक्यू पार्टियों और सभाओं के लिए परफेक्ट हैं।"
                    }
                },
                {
                    name: "Whiskey-Infused Deviled Eggs",
                    image: "img/eggs.jpg",
                    ingredients: {
                        en: [
                            "6 eggs",
                            "1/4 cup mayonnaise",
                            "1 tsp Dijon mustard",
                            "1 tbsp whiskey",
                            "1 tsp hot sauce",
                            "Paprika for garnish",
                            "Fresh chives for garnish",
                            "Salt and pepper to taste"
                        ],
                        hi: [
                            "6 अंडे",
                            "1/4 कप मेयोनेज़",
                            "1 चम्मच डिजॉन सरसों",
                            "1 बड़ा चम्मच व्हिस्की",
                            "1 चम्मच हॉट सॉस",
                            "गार्निश के लिए पपरिका",
                            "गार्निश के लिए ताजा चाइव्स",
                            "नमक और काली मिर्च स्वादानुसार"
                        ]
                    },
                    steps: {
                        en: [
                            "Boil eggs for 10 minutes. Cool, peel, and cut in half.",
                            "Remove yolks and place in a bowl.",
                            "Mash yolks with mayonnaise, mustard, whiskey, hot sauce, salt, and pepper.",
                            "Pipe or spoon yolk mixture back into egg whites.",
                            "Garnish with paprika and chives.",
                            "Chill before serving."
                        ],
                        hi: [
                            "अंडों को 10 मिनट तक उबालें। ठंडा करें, छीलें और आधा काटें।",
                            "जर्दी निकालें और एक कटोरे में रखें।",
                            "जर्दी को मेयोनेज़, सरसों, व्हिस्की, हॉट सॉस, नमक और काली मिर्च के साथ मैश करें।",
                            "जर्दी के मिश्रण को वापस अंडे की सफेदी में पाइप या चम्मच से भरें।",
                            "पपरिका और चाइव्स से गार्निश करें।",
                            "परोसने से पहले ठंडा करें।"
                        ]
                    },
                    benefits: {
                        en: "Deviled eggs provide protein while the whiskey adds a sophisticated kick. These elegant appetizers are perfect for cocktail parties.",
                        hi: "डेविल्ड एग्स प्रोटीन प्रदान करते हैं जबकि व्हिस्की एक परिष्कृत किक जोड़ती है। ये एलिगेंट ऐपेटाइज़र कॉकटेल पार्टियों के लिए परफेक्ट हैं।"
                    }
                },
                {
                    name: "Beer-Battered Fish Tacos",
                    image: "img/tacos.jpg",
                    ingredients: {
                        en: [
                            "500g white fish fillets",
                            "1 cup flour",
                            "1 cup beer",
                            "1 tsp baking powder",
                            "1 tsp paprika",
                            "Salt to taste",
                            "Oil for frying",
                            "8 small tortillas",
                            "1 cup cabbage, shredded",
                            "1/2 cup salsa",
                            "1/4 cup sour cream",
                            "Lime wedges for serving"
                        ],
                        hi: [
                            "500g सफेद मछली फिलेट",
                            "1 कप मैदा",
                            "1 कप बीयर",
                            "1 चम्मच बेकिंग पाउडर",
                            "1 चम्मच पपरिका",
                            "नमक स्वादानुसार",
                            "तलने के लिए तेल",
                            "8 छोटे टॉर्टिला",
                            "1 कप पत्तागोभी, कटी हुई",
                            "1/2 कप सालसा",
                            "1/4 कप खट्टी क्रीम",
                            "सर्व करने के लिए नींबू के वेज"
                        ]
                    },
                    steps: {
                        en: [
                            "Cut fish into strips.",
                            "Mix flour, beer, baking powder, paprika, and salt to make batter.",
                            "Heat oil in a deep pan.",
                            "Dip fish strips in batter and fry until golden and crispy.",
                            "Warm tortillas.",
                            "Assemble tacos with fish, cabbage, salsa, and sour cream.",
                            "Serve with lime wedges."
                        ],
                        hi: [
                            "मछली को स्ट्रिप्स में काटें।",
                            "बैटर बनाने के लिए मैदा, बीयर, बेकिंग पाउडर, पपरिका और नमक मिलाएं।",
                            "एक गहरे पैन में तेल गर्म करें।",
                            "मछली की स्ट्रिप्स को बैटर में डुबोएं और सुनहरा और कुरकुरा होने तक तलें।",
                            "टॉर्टिला गर्म करें।",
                            "मछली, पत्तागोभी, सालसा और खट्टी क्रीम के साथ टैको असेंबल करें।",
                            "नींबू के वेज के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Fish tacos provide omega-3 fatty acids and protein. The beer batter adds a light and crispy texture. This fun snack is perfect for casual gatherings.",
                        hi: "फिश टैको ओमेगा-3 फैटी एसिड और प्रोटीन प्रदान करते हैं। बीयर बैटर हल्की और कुरकुरी बनावट जोड़ता है। यह मजेदार स्नैक कैजुअल गेदरिंग्स के लिए परफेक्ट है।"
                    }
                },
                {
                    name: "Bourbon-Glazed Meatballs",
                    image: "img/meatballs.jpg",
                    ingredients: {
                        en: [
                            "500g ground beef",
                            "1/4 cup breadcrumbs",
                            "1 egg",
                            "1 onion, finely chopped",
                            "2 garlic cloves, minced",
                            "1 tsp dried oregano",
                            "Salt and pepper to taste",
                            "For glaze:",
                            "1/2 cup ketchup",
                            "2 tbsp brown sugar",
                            "2 tbsp bourbon",
                            "1 tbsp Worcestershire sauce",
                            "1 tsp hot sauce"
                        ],
                        hi: [
                            "500g कीमा बना हुआ बीफ",
                            "1/4 कप ब्रेडक्रम्ब्स",
                            "1 अंडा",
                            "1 प्याज, बारीक कटा हुआ",
                            "2 लहसुन की कलियाँ, बारीक कटी हुई",
                            "1 चम्मच सूखा ऑरेगैनो",
                            "नमक और काली मिर्च स्वादानुसार",
                            "ग्लेज़ के लिए:",
                            "1/2 कप केचप",
                            "2 बड़े चम्मच ब्राउन शुगर",
                            "2 बड़े चम्मच बोरबॉन",
                            "1 बड़ा चम्मच वर्सेस्टरशायर सॉस",
                            "1 चम्मच हॉट सॉस"
                        ]
                    },
                    steps: {
                        en: [
                            "Preheat oven to 200°C (400°F).",
                            "Mix ground beef, breadcrumbs, egg, onion, garlic, oregano, salt, and pepper.",
                            "Form into small meatballs and place on a baking tray.",
                            "Bake for 20 minutes or until cooked through.",
                            "For glaze: Mix all ingredients in a saucepan. Simmer for 5 minutes.",
                            "Toss meatballs in glaze.",
                            "Serve hot with toothpicks."
                        ],
                        hi: [
                            "ओवन को 200°C (400°F) पर प्रीहीट करें।",
                            "कीमा बना हुआ बीफ, ब्रेडक्रम्ब्स, अंडा, प्याज, लहसुन, ऑरेगैनो, नमक और काली मिर्च मिलाएं।",
                            "छोटे मीटबॉल बनाएं और बेकिंग ट्रे पर रखें।",
                            "20 मिनट तक बेक करें या जब तक पूरी तरह पक न जाए।",
                            "ग्लेज़ के लिए: सभी सामग्री को सॉस पैन में मिलाएं। 5 मिनट तक उबालें।",
                            "मीटबॉल को ग्लेज़ में टॉस करें।",
                            "टूथपिक के साथ गर्मागर्म परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Meatballs provide protein while the bourbon glaze adds a sophisticated flavor. These bite-sized snacks are perfect for parties and gatherings.",
                        hi: "मीटबॉल प्रोटीन प्रदान करते हैं जबकि बोरबॉन ग्लेज़ एक परिष्कृत स्वाद जोड़ता है। ये बाइट-साइज्ड स्नैक्स पार्टियों और सभाओं के लिए परफेक्ट हैं।"
                    }
                },
                {
                    name: "Spicy Lamb Kebabs",
                    image: "img/kebabs.jpg",
                    ingredients: {
                        en: [
                            "500g lamb, minced",
                            "1 onion, finely chopped",
                            "2 green chilies, finely chopped",
                            "2 tbsp coriander leaves, chopped",
                            "1 tbsp ginger-garlic paste",
                            "1 tsp cumin powder",
                            "1 tsp coriander powder",
                            "1 tsp garam masala",
                            "1/4 cup red wine",
                            "Salt to taste",
                            "Oil for grilling"
                        ],
                        hi: [
                            "500g मटन, कीमा बना हुआ",
                            "1 प्याज, बारीक कटा हुआ",
                            "2 हरी मिर्च, बारीक कटी हुई",
                            "2 बड़े चम्मच धनिया पत्ती, कटी हुई",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 चम्मच जीरा पाउडर",
                            "1 चम्मच धनिया पाउडर",
                            "1 चम्मच गरम मसाला",
                            "1/4 कप रेड वाइन",
                            "नमक स्वादानुसार",
                            "ग्रिलिंग के लिए तेल"
                        ]
                    },
                    steps: {
                        en: [
                            "Mix all ingredients except oil in a bowl.",
                            "Cover and refrigerate for 1 hour.",
                            "Shape mixture into sausage-shaped kebabs around skewers.",
                            "Brush with oil and grill until cooked and charred.",
                            "Serve hot with mint chutney."
                        ],
                        hi: [
                            "तेल को छोड़कर सभी सामग्री को एक कटोरे में मिलाएं।",
                            "ढककर 1 घंटे के लिए फ्रिज में रख दें।",
                            "मिश्रण को सीख के चारों ओर सॉसेज के आकार के कबाब बनाएं।",
                            "तेल ब्रश करें और पकने और चार होने तक ग्रिल करें।",
                            "पुदीने की चटनी के साथ गर्मागर्म परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Lamb kebabs are rich in protein and iron. The red wine helps tenderize the meat and adds flavor. These spicy kebabs are perfect with drinks or as an appetizer.",
                        hi: "मटन कबाब प्रोटीन और आयरन से भरपूर होते हैं। रेड वाइन मांस को नरम करने में मदद करती है और स्वाद जोड़ती है। ये मसालेदार कबाब ड्रिंक्स के साथ या ऐपेटाइज़र के रूप में परफेक्ट हैं।"
                    }
                },
                {
                    name: "Tandoori Chicken Skewers",
                    image: "img/skewers.jpg",
                    ingredients: {
                        en: [
                            "500g chicken breast, cubed",
                            "1 cup yogurt",
                            "2 tbsp tandoori masala",
                            "1 tbsp ginger-garlic paste",
                            "1 tbsp lemon juice",
                            "1/4 cup whiskey",
                            "2 tbsp oil",
                            "Salt to taste",
                            "Bell peppers and onions for skewers"
                        ],
                        hi: [
                            "500g चिकन ब्रेस्ट, क्यूब्स में कटा हुआ",
                            "1 कप दही",
                            "2 बड़े चम्मच तंदूरी मसाला",
                            "1 बड़ा चम्मच अदरक-लहसुन पेस्ट",
                            "1 बड़ा चम्मच नींबू का रस",
                            "1/4 कप व्हिस्की",
                            "2 बड़े चम्मच तेल",
                            "नमक स्वादानुसार",
                            "सीख के लिए शिमला मिर्च और प्याज"
                        ]
                    },
                    steps: {
                        en: [
                            "Mix yogurt, tandoori masala, ginger-garlic paste, lemon juice, whiskey, and salt.",
                            "Marinate chicken in the mixture for 2 hours.",
                            "Thread chicken, bell peppers, and onions onto skewers.",
                            "Brush with oil and grill until cooked and charred.",
                            "Serve hot with mint chutney."
                        ],
                        hi: [
                            "दही, तंदूरी मसाला, अदरक-लहसुन पेस्ट, नींबू का रस, व्हिस्की और नमक मिलाएं।",
                            "चिकन को मिश्रण में 2 घंटे के लिए मैरिनेट करें।",
                            "सीख पर चिकन, शिमला मिर्च और प्याज थ्रेड करें।",
                            "तेल ब्रश करें और पकने और चार होने तक ग्रिल करें।",
                            "पुदीने की चटनी के साथ गर्मागर्म परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Tandoori chicken is rich in protein and low in fat. The whiskey adds depth to the marinade. These skewers are perfect for parties and gatherings.",
                        hi: "तंदूरी चिकन प्रोटीन से भरपूर और वसा में कम होता है। व्हिस्की मैरिनेड में गहराई जोड़ती है। ये सीख पार्टियों और सभाओं के लिए परफेक्ट हैं।"
                    }
                }
            ],
            dinner: [
                {
                    name: "Red Wine Braised Short Ribs",
                    image: "img/braised.jpg",
                    ingredients: {
                        en: [
                            "1.5 kg beef short ribs",
                            "2 onions, chopped",
                            "2 carrots, chopped",
                            "2 celery stalks, chopped",
                            "4 garlic cloves, minced",
                            "2 cups red wine",
                            "2 cups beef broth",
                            "2 tbsp tomato paste",
                            "2 sprigs rosemary",
                            "3 sprigs thyme",
                            "2 bay leaves",
                            "2 tbsp flour",
                            "3 tbsp olive oil",
                            "Salt and pepper to taste"
                        ],
                        hi: [
                            "1.5 किलो बीफ शॉर्ट रिब्स",
                            "2 प्याज, कटा हुआ",
                            "2 गाजर, कटा हुआ",
                            "2 अजवाइन के डंठल, कटा हुआ",
                            "4 लहसुन की कलियाँ, बारीक कटी हुई",
                            "2 कप रेड वाइन",
                            "2 कप बीफ ब्रॉथ",
                            "2 बड़े चम्मच टमाटर पेस्ट",
                            "2 स्प्रिग रोज़मेरी",
                            "3 स्प्रिग थाइम",
                            "2 तेज पत्ते",
                            "2 बड़े चम्मच मैदा",
                            "3 बड़े चम्मच ऑलिव ऑयल",
                            "नमक और काली मिर्च स्वादानुसार"
                        ]
                    },
                    steps: {
                        en: [
                            "Preheat oven to 160°C (325°F).",
                            "Season ribs with salt and pepper. Dredge in flour.",
                            "Heat oil in a Dutch oven. Sear ribs on all sides. Remove and set aside.",
                            "Add onions, carrots, celery, and garlic. Sauté until soft.",
                            "Add tomato paste and cook for 2 minutes.",
                            "Add red wine and simmer until reduced by half.",
                            "Add beef broth, herbs, and ribs.",
                            "Cover and braise in oven for 3 hours or until tender.",
                            "Serve hot with mashed potatoes."
                        ],
                        hi: [
                            "ओवन को 160°C (325°F) पर प्रीहीट करें।",
                            "रिब्स को नमक और काली मिर्च के साथ सीज़न करें। मैदा में ड्रेज करें।",
                            "डच ओवन में तेल गर्म करें। रिब्स को सभी तरफ से सील करें। निकालकर अलग रख दें।",
                            "प्याज, गाजर, अजवाइन और लहसुन डालें। नरम होने तक भूनें।",
                            "टमाटर पेस्ट डालें और 2 मिनट तक पकाएं।",
                            "रेड वाइन डालें और आधा होने तक उबालें।",
                            "बीफ ब्रॉथ, जड़ी-बूटियाँ और रिब्स डालें।",
                            "ढककर ओवन में 3 घंटे तक ब्रेज़ करें या जब तक नरम न हो जाए।",
                            "मैश किए हुए आलू के साथ गर्मागर्म परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Beef short ribs are rich in protein and collagen. The red wine adds antioxidants and depth of flavor. This sophisticated dish is perfect for dinner parties.",
                        hi: "बीफ शॉर्ट रिब्स प्रोटीन और कोलेजन से भरपूर होती हैं। रेड वाइन एंटीऑक्सिडेंट और स्वाद की गहराई जोड़ती है। यह परिष्कृत व्यंजन डिनर पार्टियों के लिए परफेक्ट है।"
                    }
                },
                {
                    name: "Duck Confit with Cherry Port Sauce",
                    image: "img/confit.jpg",
                    ingredients: {
                        en: [
                            "4 duck legs",
                            "4 cups duck fat",
                            "4 garlic cloves",
                            "4 sprigs thyme",
                            "2 bay leaves",
                            "1 tbsp black peppercorns",
                            "Salt to taste",
                            "For sauce:",
                            "1 cup cherries, pitted",
                            "1/2 cup port wine",
                            "1 cup duck stock",
                            "2 tbsp sugar",
                            "1 tbsp balsamic vinegar"
                        ],
                        hi: [
                            "4 बत्तख के पैर",
                            "4 कप बत्तख की चर्बी",
                            "4 लहसुन की कलियाँ",
                            "4 स्प्रिग थाइम",
                            "2 तेज पत्ते",
                            "1 बड़ा चम्मच काली मिर्च के दाने",
                            "नमक स्वादानुसार",
                            "सॉस के लिए:",
                            "1 कप चेरी, बीज रहित",
                            "1/2 कप पोर्ट वाइन",
                            "1 कप बत्तख स्टॉक",
                            "2 बड़े चम्मच चीनी",
                            "1 बड़ा चम्मच बाल्समिक सिरका"
                        ]
                    },
                    steps: {
                        en: [
                            "Season duck legs with salt and refrigerate overnight.",
                            "Preheat oven to 120°C (250°F).",
                            "Melt duck fat in a Dutch oven.",
                            "Add duck legs, garlic, thyme, bay leaves, and peppercorns.",
                            "Cover and cook in oven for 3 hours or until tender.",
                            "Remove duck from fat and crisp skin in a hot pan.",
                            "For sauce: Combine all ingredients in a saucepan. Simmer until thickened.",
                            "Serve duck with cherry port sauce and roasted vegetables."
                        ],
                        hi: [
                            "बत्तख के पैरों को नमक के साथ सीज़न करें और रात भर फ्रिज में रख दें।",
                            "ओवन को 120°C (250°F) पर प्रीहीट करें।",
                            "डच ओवन में बत्तख की चर्बी पिघलाएं।",
                            "बत्तख के पैर, लहसुन, थाइम, तेज पत्ते और काली मिर्च के दाने डालें।",
                            "ढककर ओवन में 3 घंटे तक पकाएं या जब तक नरम न हो जाए।",
                            "बत्तख को चर्बी से निकालें और गरम पैन में त्वचा को कुरकुरा करें।",
                            "सॉस के लिए: सभी सामग्री को सॉस पैन में मिलाएं। गाढ़ा होने तक उबालें।",
                            "बत्तख को चेरी पोर्ट सॉस और भुनी हुई सब्जियों के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Duck confit is rich in protein and healthy fats. The cherry port sauce adds antioxidants and sweetness. This luxurious dish is perfect for special occasions.",
                        hi: "बत्तख कॉन्फिट प्रोटीन और स्वस्थ वसा से भरपूर होती है। चेरी पोर्ट सॉस एंटीऑक्सिडेंट और मिठास जोड़ता है। यह शानदार व्यंजन विशेष अवसरों के लिए परफेक्ट है।"
                    }
                },
                {
                    name: "Lobster Thermidor",
                    image: "img/lobster.jpg",
                    ingredients: {
                        en: [
                            "2 lobsters (about 500g each)",
                            "2 tbsp butter",
                            "1 shallot, minced",
                            "1 cup mushrooms, chopped",
                            "2 tbsp flour",
                            "1/2 cup white wine",
                            "1 cup fish stock",
                            "1/2 cup cream",
                            "2 tbsp Dijon mustard",
                            "1/4 cup brandy",
                            "1/4 cup grated cheese",
                            "Salt and pepper to taste",
                            "Fresh parsley for garnish"
                        ],
                        hi: [
                            "2 लॉबस्टर (लगभग 500g प्रत्येक)",
                            "2 बड़े चम्मच मक्खन",
                            "1 शैलट, बारीक कटा हुआ",
                            "1 कप मशरूम, कटा हुआ",
                            "2 बड़े चम्मच मैदा",
                            "1/2 कप व्हाइट वाइन",
                            "1 कप फिश स्टॉक",
                            "1/2 कप क्रीम",
                            "2 बड़े चम्मच डिजॉन सरसों",
                            "1/4 कप ब्रांडी",
                            "1/4 कप कद्दूकस किया हुआ चीज़",
                            "नमक और काली मिर्च स्वादानुसार",
                            "ताजा अजमोद गार्निश के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Boil lobsters for 8 minutes. Cool and remove meat from shells.",
                            "Chop meat and set aside.",
                            "Melt butter in a pan. Add shallot and mushrooms. Sauté until soft.",
                            "Add flour and cook for 2 minutes.",
                            "Add white wine and fish stock. Simmer until thickened.",
                            "Add cream, mustard, and brandy. Simmer for 5 minutes.",
                            "Add lobster meat and season with salt and pepper.",
                            "Fill lobster shells with mixture and top with cheese.",
                            "Broil until golden and bubbly.",
                            "Garnish with parsley and serve."
                        ],
                        hi: [
                            "लॉबस्टर को 8 मिनट तक उबालें। ठंडा करें और खोल से मांस निकालें।",
                            "मांस को काटें और अलग रख दें।",
                            "पैन में मक्खन पिघलाएं। शैलट और मशरूम डालें। नरम होने तक भूनें।",
                            "मैदा डालें और 2 मिनट तक पकाएं।",
                            "व्हाइट वाइन और फिश स्टॉक डालें। गाढ़ा होने तक उबालें।",
                            "क्रीम, सरसों और ब्रांडी डालें। 5 मिनट तक उबालें।",
                            "लॉबस्टर मांस डालें और नमक और काली मिर्च के साथ सीज़न करें।",
                            "लॉबस्टर के खोल को मिश्रण से भरें और ऊपर से चीज़ डालें।",
                            "सुनहरा और बबली होने तक ब्रोइल करें।",
                            "अजमोद से गार्निश करें और परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Lobster is rich in protein and omega-3 fatty acids. The brandy and wine add depth of flavor. This elegant dish is perfect for romantic dinners.",
                        hi: "लॉबस्टर प्रोटीन और ओमेगा-3 फैटी एसिड से भरपूर होता है। ब्रांडी और वाइन स्वाद की गहराई जोड़ते हैं। यह एलिगेंट डिश रोमांटिक डिनर के लिए परफेक्ट है।"
                    }
                },
                {
                    name: "Beef Wellington",
                    image: "img/wellington.jpg",
                    ingredients: {
                        en: [
                            "1 kg beef tenderloin",
                            "2 tbsp olive oil",
                            "Salt and pepper to taste",
                            "200g mushrooms, finely chopped",
                            "1 shallot, minced",
                            "2 tbsp butter",
                            "2 tbsp brandy",
                            "8 slices prosciutto",
                            "2 tbsp Dijon mustard",
                            "500g puff pastry",
                            "1 egg, beaten"
                        ],
                        hi: [
                            "1 किलो बीफ टेंडरलॉइन",
                            "2 बड़े चम्मच ऑलिव ऑयल",
                            "नमक और काली मिर्च स्वादानुसार",
                            "200g मशरूम, बारीक कटा हुआ",
                            "1 शैलट, बारीक कटा हुआ",
                            "2 बड़े चम्मच मक्खन",
                            "2 बड़े चम्मच ब्रांडी",
                            "8 स्लाइस प्रोसिउट्टो",
                            "2 बड़े चम्मच डिजॉन सरसों",
                            "500g पफ पेस्ट्री",
                            "1 अंडा, फेंटा हुआ"
                        ]
                    },
                    steps: {
                        en: [
                            "Season beef with salt and pepper. Sear on all sides in hot oil. Brush with mustard and cool.",
                            "Sauté mushrooms and shallot in butter until dry. Add brandy and cook until evaporated.",
                            "Lay prosciutto on plastic wrap. Spread mushroom mixture over prosciutto.",
                            "Place beef on mushroom mixture and wrap tightly. Chill for 30 minutes.",
                            "Roll out pastry. Place beef parcel in center and wrap completely.",
                            "Brush with beaten egg. Score pastry decoratively.",
                            "Bake at 200°C (400°F) for 40 minutes or until golden.",
                            "Rest for 10 minutes before slicing and serving."
                        ],
                        hi: [
                            "बीफ को नमक और काली मिर्च के साथ सीज़न करें। गरम तेल में सभी तरफ से सील करें। सरसों ब्रश करें और ठंडा करें।",
                            "मशरूम और शैलट को मक्खन में सूखने तक भूनें। ब्रांडी डालें और वाष्पित होने तक पकाएं।",
                            "प्लास्टिक रैप पर प्रोसिउट्टो बिछाएं। प्रोसिउट्टो पर मशरूम मिश्रण फैलाएं।",
                            "बीफ को मशरूम मिश्रण पर रखें और कसकर लपेटें। 30 मिनट के लिए ठंडा करें।",
                            "पेस्ट्री बेलें। केंद्र में बीफ पार्सल रखें और पूरी तरह लपेटें।",
                            "फेंटे हुए अंडे से ब्रश करें। सजावटी रूप से पेस्ट्री स्कोर करें।",
                            "200°C (400°F) पर 40 मिनट तक बेक करें या जब तक सुनहरा न हो जाए।",
                            "स्लाइस करने और परोसने से पहले 10 मिनट आराम दें।"
                        ]
                    },
                    benefits: {
                        en: "Beef Wellington provides high-quality protein. The puff pastry adds carbohydrates for energy. This classic dish is perfect for celebratory dinners.",
                        hi: "बीफ वेलिंगटन उच्च गुणवत्ता वाला प्रोटीन प्रदान करता है। पफ पेस्ट्री ऊर्जा के लिए कार्बोहाइड्रेट जोड़ती है। यह क्लासिक डिश सेलिब्रेटरी डिनर के लिए परफेक्ट है।"
                    }
                },
                {
                    name: "Coq au Vin",
                    image: "img/viu.jpg",
                    ingredients: {
                        en: [
                            "1 whole chicken, cut into pieces",
                            "200g bacon, diced",
                            "20 pearl onions",
                            "200g mushrooms, quartered",
                            "2 carrots, chopped",
                            "2 celery stalks, chopped",
                            "4 garlic cloves, minced",
                            "2 cups red wine",
                            "2 cups chicken stock",
                            "2 tbsp brandy",
                            "2 tbsp flour",
                            "2 tbsp butter",
                            "2 sprigs thyme",
                            "2 bay leaves",
                            "Salt and pepper to taste",
                            "Fresh parsley for garnish"
                        ],
                        hi: [
                            "1 पूरा चिकन, टुकड़ों में कटा हुआ",
                            "200g बेकन, कटा हुआ",
                            "20 पर्ल प्याज",
                            "200g मशरूम, क्वार्टर किया हुआ",
                            "2 गाजर, कटा हुआ",
                            "2 अजवाइन के डंठल, कटा हुआ",
                            "4 लहसुन की कलियाँ, बारीक कटी हुई",
                            "2 कप रेड वाइन",
                            "2 कप चिकन स्टॉक",
                            "2 बड़े चम्मच ब्रांडी",
                            "2 बड़े चम्मच मैदा",
                            "2 बड़े चम्मच मक्खन",
                            "2 स्प्रिग थाइम",
                            "2 तेज पत्ते",
                            "नमक और काली मिर्च स्वादानुसार",
                            "ताजा अजमोद गार्निश के लिए"
                        ]
                    },
                    steps: {
                        en: [
                            "Cook bacon in a Dutch oven until crispy. Remove and set aside.",
                            "Season chicken with salt and pepper. Brown in bacon fat. Remove and set aside.",
                            "Add onions, mushrooms, carrots, celery, and garlic. Sauté until soft.",
                            "Add flour and cook for 2 minutes.",
                            "Add brandy and flambé (optional).",
                            "Add wine, stock, herbs, bacon, and chicken.",
                            "Cover and simmer for 1.5 hours or until chicken is tender.",
                            "Garnish with parsley and serve with crusty bread."
                        ],
                        hi: [
                            "डच ओवन में बेकन को कुरकुरा होने तक पकाएं। निकालकर अलग रख दें।",
                            "चिकन को नमक और काली मिर्च के साथ सीज़न करें। बेकन चर्बी में भूरा करें। निकालकर अलग रख दें।",
                            "प्याज, मशरूम, गाजर, अजवाइन और लहसुन डालें। नरम होने तक भूनें।",
                            "मैदा डालें और 2 मिनट तक पकाएं।",
                            "ब्रांडी डालें और फ्लैम्बे करें (वैकल्पिक)।",
                            "वाइन, स्टॉक, जड़ी-बूटियाँ, बेकन और चिकन डालें।",
                            "ढककर 1.5 घंटे तक उबालें या जब तक चिकन नरम न हो जाए।",
                            "अजमोद से गार्निश करें और क्रस्टी ब्रेड के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Coq au Vin is rich in protein from chicken. The red wine adds antioxidants and depth of flavor. This classic French dish is satisfying and perfect for dinner parties.",
                        hi: "कोक औ विन चिकन से प्रोटीन से भरपूर होता है। रेड वाइन एंटीऑक्सिडेंट और स्वाद की गहराई जोड़ती है। यह क्लासिक फ्रेंच डिश संतोषजनक है और डिनर पार्टियों के लिए परफेक्ट है।"
                    }
                },
                {
                    name: "Rack of Lamb with Red Wine Jus",
                    image: "img/lamb.jpg",
                    ingredients: {
                        en: [
                            "1 rack of lamb (8 ribs)",
                            "2 tbsp olive oil",
                            "4 garlic cloves, minced",
                            "2 tbsp rosemary, chopped",
                            "Salt and pepper to taste",
                            "For jus:",
                            "1 cup red wine",
                            "1 cup beef stock",
                            "1 shallot, minced",
                            "2 tbsp butter",
                            "Salt and pepper to taste"
                        ],
                        hi: [
                            "1 रैक मटन (8 रिब्स)",
                            "2 बड़े चम्मच ऑलिव ऑयल",
                            "4 लहसुन की कलियाँ, बारीक कटी हुई",
                            "2 बड़े चम्मच रोज़मेरी, कटा हुआ",
                            "नमक और काली मिर्च स्वादानुसार",
                            "जूस के लिए:",
                            "1 कप रेड वाइन",
                            "1 कप बीफ स्टॉक",
                            "1 शैलट, बारीक कटा हुआ",
                            "2 बड़े चम्मच मक्खन",
                            "नमक और काली मिर्च स्वादानुसार"
                        ]
                    },
                    steps: {
                        en: [
                            "Preheat oven to 200°C (400°F).",
                            "Rub lamb with oil, garlic, rosemary, salt, and pepper.",
                            "Sear lamb in a hot pan on all sides.",
                            "Roast in oven for 20 minutes for medium-rare.",
                            "Rest for 10 minutes before slicing.",
                            "For jus: Sauté shallot in pan drippings.",
                            "Add red wine and reduce by half.",
                            "Add beef stock and reduce by half.",
                            "Whisk in butter and season.",
                            "Serve lamb with jus and roasted vegetables."
                        ],
                        hi: [
                            "ओवन को 200°C (400°F) पर प्रीहीट करें।",
                            "मटन को तेल, लहसुन, रोज़मेरी, नमक और काली मिर्च के साथ रगड़ें।",
                            "गरम पैन में मटन को सभी तरफ से सील करें।",
                            "मीडियम-रेयर के लिए ओवन में 20 मिनट तक रोस्ट करें।",
                            "स्लाइस करने से पहले 10 मिनट आराम दें।",
                            "जूस के लिए: पैन ड्रिपिंग में शैलट भूनें।",
                            "रेड वाइन डालें और आधा होने तक कम करें।",
                            "बीफ स्टॉक डालें और आधा होने तक कम करें।",
                            "मक्खन डालें और सीज़न करें।",
                            "मटन को जूस और भुनी हुई सब्जियों के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Rack of lamb is rich in protein and iron. The red wine jus adds antioxidants and depth of flavor. This elegant dish is perfect for special occasions.",
                        hi: "मटन रैक प्रोटीन और आयरन से भरपूर होती है। रेड वाइन जूस एंटीऑक्सिडेंट और स्वाद की गहराई जोड़ता है। यह एलिगेंट डिश विशेष अवसरों के लिए परफेक्ट है।"
                    }
                },
                {
                    name: "Seafood Paella with Saffron",
                    image: "img/seafood.jpg",
                    ingredients: {
                        en: [
                            "2 cups short-grain rice",
                            "500g mixed seafood (shrimp, mussels, squid)",
                            "1 onion, chopped",
                            "1 red bell pepper, chopped",
                            "4 garlic cloves, minced",
                            "1 tomato, grated",
                            "1 tsp smoked paprika",
                            "Pinch of saffron threads",
                            "4 cups fish stock",
                            "1/2 cup white wine",
                            "1/4 cup olive oil",
                            "Salt to taste",
                            "Lemon wedges for serving"
                        ],
                        hi: [
                            "2 कप शॉर्ट-ग्रेन चावल",
                            "500g मिश्रित सीफूड (झींगे, मसल्स, स्क्विड)",
                            "1 प्याज, कटा हुआ",
                            "1 लाल शिमला मिर्च, कटा हुआ",
                            "4 लहसुन की कलियाँ, बारीक कटी हुई",
                            "1 टमाटर, कद्दूकस किया हुआ",
                            "1 चम्मच स्मोक्ड पपरिका",
                            "चुटकी भर केसर के तार",
                            "4 कप फिश स्टॉक",
                            "1/2 कप व्हाइट वाइन",
                            "1/4 कप ऑलिव ऑयल",
                            "नमक स्वादानुसार",
                            "सर्व करने के लिए नींबू के वेज"
                        ]
                    },
                    steps: {
                        en: [
                            "Heat oil in a paella pan. Add onion and bell pepper. Sauté until soft.",
                            "Add garlic and paprika. Cook for 1 minute.",
                            "Add tomato and cook for 2 minutes.",
                            "Add rice and stir to coat.",
                            "Add wine and cook until evaporated.",
                            "Add stock, saffron, and salt. Bring to boil.",
                            "Arrange seafood on top. Do not stir.",
                            "Simmer for 20 minutes or until rice is cooked.",
                            "Cover and rest for 5 minutes.",
                            "Serve with lemon wedges."
                        ],
                        hi: [
                            "पैला पैन में तेल गर्म करें। प्याज और शिमला मिर्च डालें। नरम होने तक भूनें।",
                            "लहसुन और पपरिका डालें। 1 मिनट तक पकाएं।",
                            "टमाटर डालें और 2 मिनट तक पकाएं।",
                            "चावल डालें और कोट करने के लिए हिलाएं।",
                            "वाइन डालें और वाष्पित होने तक पकाएं।",
                            "स्टॉक, केसर और नमक डालें। उबाल लें।",
                            "शीर्ष पर सीफूड व्यवस्थित करें। हिलाएं नहीं।",
                            "20 मिनट तक उबालें या जब तक चावल पक न जाए।",
                            "ढककर 5 मिनट आराम दें।",
                            "नींबू के वेज के साथ परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Seafood provides protein and omega-3 fatty acids. Saffron adds antioxidants and flavor. This vibrant dish is perfect for dinner parties.",
                        hi: "सीफूड प्रोटीन और ओमेगा-3 फैटी एसिड प्रदान करता है। केसर एंटीऑक्सिडेंट और स्वाद जोड़ता है। यह जीवंत व्यंजन डिनर पार्टियों के लिए परफेक्ट है।"
                    }
                },
                {
                    name: "Venison Steak with Berry Sauce",
                    image: "img/steak.jpg",
                    ingredients: {
                        en: [
                            "4 venison steaks",
                            "2 tbsp olive oil",
                            "Salt and pepper to taste",
                            "For sauce:",
                            "1 cup mixed berries",
                            "1/4 cup red wine",
                            "2 tbsp sugar",
                            "1 tbsp balsamic vinegar",
                            "1 sprig rosemary"
                        ],
                        hi: [
                            "4 वेनिसन स्टेक",
                            "2 बड़े चम्मच ऑलिव ऑयल",
                            "नमक और काली मिर्च स्वादानुसार",
                            "सॉस के लिए:",
                            "1 कप मिश्रित बेरीज़",
                            "1/4 कप रेड वाइन",
                            "2 बड़े चम्मच चीनी",
                            "1 बड़ा चम्मच बाल्समिक सिरका",
                            "1 स्प्रिग रोज़मेरी"
                        ]
                    },
                    steps: {
                        en: [
                            "Season venison with salt and pepper.",
                            "Heat oil in a pan. Sear steaks for 3-4 minutes per side for medium-rare.",
                            "Rest for 5 minutes.",
                            "For sauce: Combine all ingredients in a saucepan. Simmer until thickened.",
                            "Serve steaks with berry sauce and roasted potatoes."
                        ],
                        hi: [
                            "वेनिसन को नमक और काली मिर्च के साथ सीज़न करें।",
                            "पैन में तेल गर्म करें। मीडियम-रेयर के लिए प्रति साइड 3-4 मिनट के लिए स्टेक सील करें।",
                            "5 मिनट आराम दें।",
                            "सॉस के लिए: सभी सामग्री को सॉस पैन में मिलाएं। गाढ़ा होने तक उबालें।",
                            "बेरी सॉस और भुने हुए आलू के साथ स्टेक परोसें।"
                        ]
                    },
                    benefits: {
                        en: "Venison is lean and rich in protein and iron. The berry sauce adds antioxidants and sweetness. This sophisticated dish is perfect for special dinners.",
                        hi: "वेनिसन लीन होता है और प्रोटीन और आयरन से भरपूर होता है। बेरी सॉस एंटीऑक्सिडेंट और मिठास जोड़ता है। यह परिष्कृत व्यंजन विशेष रात्रिभोज के लिए परफेक्ट है।"
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