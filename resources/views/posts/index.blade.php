<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog - Posts</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: #f9fafb;
            min-height: 100vh;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 280px;
            background: white;
            border-right: 1px solid #e5e7eb;
            padding: 24px 0;
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 0 20px 20px;
            margin-bottom: 8px;
        }

        .sidebar-title {
            color: #6b7280;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 12px;
        }

        .blog-title {
            font-size: 24px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 4px;
        }

        .blog-subtitle {
            font-size: 13px;
            color: #6b7280;
        }

        
        .category-list {
            list-style: none;
            flex: 1;
        }

        .category-item {
            margin-bottom: 2px;
        }

        .category-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            color: #374151;
            text-decoration: none;
            transition: all 0.15s ease;
            font-size: 15px;
            font-weight: 500;
            position: relative;
        }

        .category-link:hover {
            background: #f3f4f6;
            color: #111827;
        }

        .category-link.active {
            background: #f3f4f6;
            color: #9AA0A6#;
            font-weight: 600;
        }

        .category-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: #9AA0A6;
        }

        .category-content {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .category-icon {
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .category-count {
            background: #f3f4f6;
            color: #6b7280;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            min-width: 24px;
            text-align: center;
        }

        .category-link.active .category-count {
            background: #eef2ff;
            color: #6366f1;
        }

        
        .sidebar-footer {
            border-top: 1px solid #e5e7eb;
            padding-top: 12px;
            margin-top: 12px;
        }

        .footer-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 20px;
            color: #6b7280;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.15s ease;
        }

        .footer-link:hover {
            background: #f3f4f6;
            color: #111827;
        }

        .footer-link i {
            width: 20px;
            font-size: 16px;
        }

        
        .main-content {
            flex: 1;
            padding: 32px;
            overflow-y: auto;
        }

        .content-header {
            margin-bottom: 32px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 8px;
        }

        .page-subtitle {
            font-size: 16px;
            color: #6b7280;
        }

        
        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 24px;
        }

        .post-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            border: 1px solid #e5e7eb;
        }

        .post-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.15);
        }

        .post-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background: linear-gradient(135deg, #9AA0A6 0%, #000000 100%);
        }

        .post-content {
            padding: 20px;
        }

        .post-category {
            display: inline-block;
            background: #eef2ff;
            color: #6366f1;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            margin-bottom: 12px;
            font-weight: 600;
        }

        .post-title {
            color: #111827;
            font-size: 20px;
            margin-bottom: 8px;
            font-weight: 600;
            line-height: 1.4;
        }

        .post-text {
            color: #6b7280;
            line-height: 1.6;
            margin-bottom: 16px;
            font-size: 14px;
        }

        .post-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 16px;
            border-top: 1px solid #f3f4f6;
        }

        .post-date {
            color: #9ca3af;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .read-more {
            color: #6366f1;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .read-more:hover {
            gap: 8px;
        }

        .no-posts {
            grid-column: 1 / -1;
            text-align: center;
            padding: 80px 20px;
            background: white;
            border-radius: 12px;
            color: #6b7280;
        }

        .no-posts i {
            font-size: 48px;
            color: #d1d5db;
            margin-bottom: 16px;
        }

        .no-posts h3 {
            font-size: 20px;
            margin-bottom: 8px;
            color: #374151;
        }

    
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: static;
                border-right: none;
                border-bottom: 1px solid #e5e7eb;
            }

            .main-content {
                padding: 20px;
            }

            .posts-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-title">Blog</div>
                <h1 class="blog-title">📝 My Blog</h1>
                <p class="blog-subtitle">Explore our categories</p>
            </div>

            <ul class="category-list">
                <li class="category-item">
                    <a href="{{ route('posts.index') }}" 
                       class="category-link {{ !request('category') ? 'active' : '' }}">
                        <div class="category-content">
                            <span class="category-icon">
                                <i class="fas fa-th-large"></i>
                            </span>
                            <span>All Posts</span>
                        </div>
                        <span class="category-count">{{ $posts->count() }}</span>
                    </a>
                </li>

                @foreach($categories as $category)
                <li class="category-item">
                    <a href="{{ route('posts.index', ['category' => $category->id]) }}" 
                       class="category-link {{ $selectedCategory == $category->id ? 'active' : '' }}">
                        <div class="category-content">
                            <span class="category-icon">
                                @if($category->name == 'Technology')
                                    <i class="fas fa-laptop-code"></i>
                                @elseif($category->name == 'Travel')
                                    <i class="fas fa-plane"></i>
                                @elseif($category->name == 'Food')
                                    <i class="fas fa-utensils"></i>
                                @elseif($category->name == 'Lifestyle')
                                    <i class="fas fa-heart"></i>
                                @else
                                    <i class="fas fa-folder"></i>
                                @endif
                            </span>
                            <span>{{ $category->name }}</span>
                        </div>
                        <span class="category-count">{{ $category->posts_count }}</span>
                    </a>
                </li>
                @endforeach
            </ul>

            <div class="sidebar-footer">
                <a href="#" class="footer-link">
                    <i class="fas fa-question-circle"></i>
                    <span>Help & Support</span>
                </a>
                <a href="#" class="footer-link">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </div>
        </aside>

        <main class="main-content">
            <div class="content-header">
                <h2 class="page-title">
                    @if(request('category'))
                        {{ $categories->where('id', request('category'))->first()->name ?? 'All Posts' }}
                    @else
                        All Posts
                    @endif
                </h2>
                <p class="page-subtitle">
                    Showing {{ $posts->count() }} {{ $posts->count() == 1 ? 'post' : 'posts' }}
                </p>
            </div>

            <div class="posts-grid">
                @forelse($posts as $post)
                <article class="post-card" onclick="window.location='{{ route('posts.show', $post->id) }}'">
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="post-image">
                    @else
                        <div class="post-image"></div>
                    @endif
                    
                    <div class="post-content">
                        <span class="post-category">{{ $post->category->name ?? 'Uncategorized' }}</span>
                        <h3 class="post-title">{{ $post->title }}</h3>
                        <p class="post-text">{{ Str::limit($post->text, 100) }}</p>
                        
                        <div class="post-meta">
                            <span class="post-date">
                                <i class="far fa-calendar"></i>
                                {{ $post->created_at->format('M d, Y') }}
                            </span>
                            <a href="{{ route('posts.show', $post->id) }}" class="read-more">
                                Read More 
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </article>
                @empty
                <div class="no-posts">
                    <i class="fas fa-inbox"></i>
                    <h3>No posts found</h3>
                    <p>There are no posts in this category yet.</p>
                </div>
                @endforelse
            </div>
        </main>
    </div>
</body>
</html>