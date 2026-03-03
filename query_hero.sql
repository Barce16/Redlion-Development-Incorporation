SELECT
  id,
  type,
  image_path,
  is_published,
  scheduled_publish_at,
  created_at,
  updated_at
FROM welcome_images
WHERE type='hero'
ORDER BY created_at DESC;
