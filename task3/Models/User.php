<?php

class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $articles = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * create new article
     *
     * @param array $attributes
     * @return Article
     */
    public function createArticle(array $attributes = []): Article
    {
        $article = new Article(
            $attributes['title'] ?? '' ,
            $attributes['body'] ?? ''
        );
        $article->setAuthor($this);
        $this->articles[] = $article;

        return $article;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getArticles(): array
    {
        return $this->articles;
    }

    /**
     * @param Article $article
     */
    public function setArticle(Article $article)
    {
        $this->articles[] = $article;
    }

    /**
     * @param Article $article
     * @return User
     */
    public function deleteArticle(Article $article): self
    {
        //TODO: rm article from $this->articles
        return $this;
    }




}