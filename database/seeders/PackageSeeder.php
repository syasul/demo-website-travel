<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            [
                'title' => 'Maldives Archipelago',
                'slug' => 'maldives-archipelago',
                'description' => 'Pristine waters and overwater villas. Experience the height of luxury with private island tours, premium spa treatments, and signature culinary journeys overlooking the turquoise lagoons.',
                'price' => 12500.00,
                'duration' => '7 Days, 6 Nights',
                'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAVYewfj5-JKx3kj0sHtgZIdPQX628X9AGcemvAIsgFYpYR0aG1r45qkEVLD4HwFsDxrX-WI4g84ybDbixzr1iUUoMyGTdFpeDTLYYQqAHJc2TMqqEVWxfojzq0A6cS83YRbPndDWzARWjH5KG0jhpdLTeq4ie8c3iE094HRI1XTSBIIdKaaeavQOz43CNdoergzct9dpGtqv_qsmbPO78U574c8vRXzRzs7B3pgtgyHkAU6Hw26Qs8SA5XoG5dMZmppzFAHQBxFWLn',
                'location' => 'Maldives',
                'category' => 'Luxury',
                'what_is_included' => [
                    'Overwater Villa Stay with private pool',
                    'All Gourmet Meals & Premium Beverages included',
                    'Private Yacht Island Hopping Tour',
                    'Daily Spa & Wellness treatments',
                    'Roundtrip Luxury Speedboat Transfers',
                    'Dedicated 24/7 Island Host/Butler'
                ],
                'itinerary' => [
                    ['day' => 1, 'title' => 'Arrival & Sunset Overwater Dinner', 'description' => 'Receive a warm welcome at Malé Airport followed by a scenic speedboat transfer. Check in to your private villa and enjoy a sunset cocktail and welcome dinner.'],
                    ['day' => 2, 'title' => 'Snorkeling & Coral Restoration', 'description' => 'Explore the vibrant house reef with a marine biologist. Participate in our coral planting program to help preserve the ecosystem.'],
                    ['day' => 3, 'title' => 'Private Yacht Excursion & Sandbank Picnic', 'description' => 'Board a private luxury yacht for a day of cruising. Enjoy a gourmet picnic lunch served on a completely secluded sandbank.'],
                    ['day' => 4, 'title' => 'Spa Retreat & Wellness Consultation', 'description' => 'Indulge in a personalized wellness consultation followed by an signature couples massage and holistic therapies.'],
                    ['day' => 5, 'title' => 'Sunset Dolphin Cruise & Night Snorkeling', 'description' => 'Set sail at dusk to spot wild spinner dolphins, followed by an optional guided night snorkeling safari.'],
                    ['day' => 6, 'title' => 'Beachside Candlelit Farewell Feast', 'description' => 'Spend your final full day relaxing. In the evening, enjoy a private multi-course candlelit seafood barbecue on the beach.'],
                    ['day' => 7, 'title' => 'Farewell Maldives & Departure', 'description' => 'Enjoy breakfast in your villa before checking out. Board the speed boat back to Malé for your international flight home.']
                ],
                'inventory' => 5,
            ],
            [
                'title' => 'London Urbanity',
                'slug' => 'london-urbanity',
                'description' => 'The height of sophistication. Explore historic monuments, luxury boutiques, and world-class heritage architecture. Indulge in private gallery tours and fine dining experiences curated by the city\'s best concierges.',
                'price' => 8500.00,
                'duration' => '5 Days, 4 Nights',
                'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAhYdFX-W3inhLgqvGVWjg8KmB9Jjj0s9uneNbHWoPm_ZHyVFz_L41RiBMDWtl3PC2QzVARiaWeslmkcei6GhiVzGl1afuxZBz_N5EAWqn5ZYGpHO2GcD2U8KvVxzmwn2gykSzX_KYfolwGu6OHjMUhumuW39fTBNDTgS5bpaZVtRw0_m7zOAaprhVGf6YlhhqJWlGniZKFL6Ax33dKE2M4W-MMBflsuVmLXHnErfy8YP5gH_gY52UEUFSKyo_2SSmn2QIBUyrKN8Lo',
                'location' => 'United Kingdom',
                'category' => 'Urban',
                'what_is_included' => [
                    '5-Star Luxury Boutique Hotel stay in Mayfair',
                    'Private historian guide for all city excursions',
                    'VIP West End show tickets with backstage pass',
                    'Daily Michelin-starred dining experiences',
                    'Airport Chauffeur service in a Rolls-Royce'
                ],
                'itinerary' => [
                    ['day' => 1, 'title' => 'Chauffeur Arrival & Welcome High Tea', 'description' => 'Arrive in style with a private Rolls-Royce transfer. Indulge in a traditional afternoon high tea before settling into your Mayfair suite.'],
                    ['day' => 2, 'title' => 'Tower of London VIP & Crown Jewels Tour', 'description' => 'Experience a private, before-hours tour of the Tower of London led by a Yeoman Warder. Enjoy lunch overlooking the Thames.'],
                    ['day' => 3, 'title' => 'West End Theatre Night & Backstage Access', 'description' => 'Spend the morning at the British Museum with a private curator. In the evening, attend a top West End musical with VIP seats.'],
                    ['day' => 4, 'title' => 'Royal Parks Tour & Michelin Dining', 'description' => 'Stroll through Hyde Park and Kensington Gardens, followed by a personalized shopping experience in Harrods and dinner at a Michelin-star restaurant.'],
                    ['day' => 5, 'title' => 'Bespoke Curio Shopping & Departure', 'description' => 'Pick up exclusive souvenirs with your personal shopper before your private transfer back to Heathrow.']
                ],
                'inventory' => 8,
            ],
            [
                'title' => 'Swiss Alps Adventure',
                'slug' => 'swiss-alps',
                'description' => 'Majestic alpine peaks and ultra-luxurious private mountain chalets. Experience high-altitude skiing, private helicopter flights over glaciers, and traditional warm hospitality amidst snow-dusted ridges.',
                'price' => 14000.00,
                'duration' => '8 Days, 7 Nights',
                'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAExvbX0QJWEbVNxKzhgvN3WWxnGGKzDbce3IfsEHIXfqPkq_xYsLMSKnFaPotFvRo6kVh5XC44TBOPgwjgr-rOQ9WTOUGVE9sb6L3I51cmztmpYR2zaEfrWa9JaQ7qhXYmqcf91HSrGHcu7--jW6jAWPPWLwENCqpQ0DNNncNgEjrn67vI11oMBpx-aXycizr8GE9iHDru8sG5PFjEKNIn7lmxlO4aHDrW_7fRPB-wBBOczMDF9f29lL3dmbVjJkJnZabUGzXJ_XGa',
                'location' => 'Switzerland',
                'category' => 'Adventure',
                'what_is_included' => [
                    'Exclusive ski-in/ski-out chalet with private chef',
                    'All-access lift passes and premium ski gear rental',
                    'Private Helicopter Tour over Zermatt & Matterhorn',
                    'Alpine wine tasting and gourmet fondue evenings',
                    'Dedicated professional mountain guide'
                ],
                'itinerary' => [
                    ['day' => 1, 'title' => 'Arrival & Chalet Fireside Welcome', 'description' => 'Arrive in Zermatt by cogwheel train. Settle into your luxury chalet and enjoy a welcome cocktail around the roaring fireplace.'],
                    ['day' => 2, 'title' => 'Ski Instruction & Slopes Exploration', 'description' => 'Meet your private guide and hit the slopes. Enjoy personalized instruction and ski down pristine runs.'],
                    ['day' => 3, 'title' => 'Scenic Helicopter flight & Glacier Landing', 'description' => 'Board a private helicopter for breathtaking aerial views of the Matterhorn. Land on a glacier for a champagne toast.'],
                    ['day' => 4, 'title' => 'Snowshoe Hike & Traditional Fondue Feast', 'description' => 'Go on a peaceful snowshoe hike through pine forests. In the evening, savor a traditional Swiss fondue dinner.'],
                    ['day' => 5, 'title' => 'Spa & Thermal Wellness Day', 'description' => 'Relax your muscles with a day dedicated to outdoor thermal pools, steam rooms, and restorative massages.'],
                    ['day' => 6, 'title' => 'Peak Ascent & High-Altitude Dining', 'description' => 'Take the highest cable car in Europe to the Matterhorn Glacier Paradise for stunning 360-degree views.'],
                    ['day' => 7, 'title' => 'Traditional Village Carriage Tour', 'description' => 'Explore the charming car-free village of Zermatt in a horse-drawn carriage. Pick up Swiss chocolates and watches.'],
                    ['day' => 8, 'title' => 'Departure & Scenic Train Journey', 'description' => 'Check out of your chalet and board the Glacier Express train for a scenic transfer to the airport.']
                ],
                'inventory' => 4,
            ],
            [
                'title' => 'Venice Serenades',
                'slug' => 'venice-serenades',
                'description' => 'Timeless romance on the historic canals. Glide on private gondolas past ancient stone palaces, discover Murano\'s glassblowing heritage, and dine on authentic Venetian delicacies overlooking the glowing waters.',
                'price' => 9800.00,
                'duration' => '6 Days, 5 Nights',
                'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDEVK7M6u087oWA9ZIuSxU4-P8TvoZo7hf5nacEwk5Lb0QAaNGEpgRrotDTTL4ndkcESmtHm8C9xiNhZvnxBq38DY2cUHLlPEuYHRaLnAG09fNy6JFAzGHLPrJetgs5g06MIDs0kqSyfYcqGCj120vzOaMl8vgnQ1Rq8YRKV6Oo9OORQaIrlAi1rke1Ip9IMUhhIZjajhWL1HtWCg1_tneO5d8490p0m7xVUm1FaEcg3V72MEbYQZrH61BtJ4vQC46wl1-2rwCScq_-',
                'location' => 'Italy',
                'category' => 'Romantic',
                'what_is_included' => [
                    'Grand Canal Palazzo hotel stay',
                    'Private classic Gondola ride with serenade',
                    'Art History VIP tour of St. Mark’s Basilica & Doge’s Palace',
                    'Private boat tour to Murano & Burano islands',
                    'Gourmet Venetian dining & private wine tasting'
                ],
                'itinerary' => [
                    ['day' => 1, 'title' => 'Arrival & Evening Gondola Transfer', 'description' => 'Arrive in Venice and board a private water taxi to your grand canal palazzo. Enjoy a welcome dinner overlooking the water.'],
                    ['day' => 2, 'title' => 'St. Mark\'s & Doge\'s Palace VIP Tour', 'description' => 'Skip the lines with a private guide. Tour the magnificent St. Mark\'s Basilica and cross the Bridge of Sighs in the Doge\'s Palace.'],
                    ['day' => 3, 'title' => 'Murano Glassblowing & Burano Lace', 'description' => 'Cruise to Murano island for a private glassblowing demonstration, then explore the colorful houses of Burano.'],
                    ['day' => 4, 'title' => 'Venetian Lagoon Wine Tasting', 'description' => 'Visit a historical vineyard on a hidden island in the lagoon. Taste indigenous Venetian wines paired with local chicchetti.'],
                    ['day' => 5, 'title' => 'Musica a Palazzo & Farewell Dinner', 'description' => 'Enjoy an opera performance set in a historic palazzo, followed by a romantic farewell candlelight dinner.'],
                    ['day' => 6, 'title' => 'Morning Espresso & Water Taxi Departure', 'description' => 'Savor one last Italian espresso overlooking the Grand Canal before your private water taxi transfer to the airport.']
                ],
                'inventory' => 6,
            ],
        ];

        foreach ($packages as $pkg) {
            Package::create($pkg);
        }
    }
}
