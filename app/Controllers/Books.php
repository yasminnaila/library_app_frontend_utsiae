<?php

namespace App\Controllers;

use App\Libraries\BookApiClient;

class Books extends BaseController
{
    protected $bookApi;

    public function __construct()
    {
        $this->bookApi = new BookApiClient();
    }

    /**
     * Display list of books
     */
    public function index()
    {
        $search = $this->request->getGet('search');
        $category = $this->request->getGet('category');
        $status = $this->request->getGet('status');

        $params = [];
        if ($search) $params['search'] = $search;
        if ($category) $params['category'] = $category;
        if ($status) $params['status'] = $status;

        $response = $this->bookApi->getAllBooks($params);

        $data = [
            'title' => 'Daftar Buku',
            'books' => $response['data'] ?? [],
            'success' => $response['success'] ?? false,
            'message' => $response['message'] ?? '',
            'search' => $search,
            'category' => $category,
            'status' => $status
        ];

        return view('books/index', $data);
    }

    /**
     * Show create form
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Buku Baru'
        ];

        return view('books/create', $data);
    }

    /**
     * Store new book
     */
    public function store()
    {
        $postData = [
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'publisher' => $this->request->getPost('publisher'),
            'publication_year' => (int) $this->request->getPost('publication_year'),
            'pages' => (int) $this->request->getPost('pages'),
            'category' => $this->request->getPost('category'),
            'isbn' => $this->request->getPost('isbn'),
            'status' => $this->request->getPost('status'),
        ];

        $response = $this->bookApi->createBook($postData);

        if ($response['success']) {
            return redirect()->to('/books')->with('success', 'Buku berhasil ditambahkan!');
        } else {
            return redirect()->back()->withInput()->with('error', $response['message']);
        }
    }

    /**
     * Show single book
     */
    public function show($id)
    {
        $response = $this->bookApi->getBook($id);

        if (!$response['success']) {
            return redirect()->to('/books')->with('error', 'Buku tidak ditemukan!');
        }

        $data = [
            'title' => 'Detail Buku',
            'book' => $response['data']
        ];

        return view('books/show', $data);
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $response = $this->bookApi->getBook($id);

        if (!$response['success']) {
            return redirect()->to('/books')->with('error', 'Buku tidak ditemukan!');
        }

        $data = [
            'title' => 'Edit Buku',
            'book' => $response['data']
        ];

        return view('books/edit', $data);
    }

    /**
     * Update book
     */
    public function update($id)
    {
        $postData = [
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'publisher' => $this->request->getPost('publisher'),
            'publication_year' => (int) $this->request->getPost('publication_year'),
            'pages' => (int) $this->request->getPost('pages'),
            'category' => $this->request->getPost('category'),
            'isbn' => $this->request->getPost('isbn'),
            'status' => $this->request->getPost('status'),
        ];

        $response = $this->bookApi->updateBook($id, $postData);

        if ($response['success']) {
            return redirect()->to('/books')->with('success', 'Buku berhasil diupdate!');
        } else {
            return redirect()->back()->withInput()->with('error', $response['message']);
        }
    }

    /**
     * Delete book
     */
    public function delete($id)
    {
        $response = $this->bookApi->deleteBook($id);

        if ($response['success']) {
            return redirect()->to('/books')->with('success', 'Buku berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', $response['message']);
        }
    }
}
