Add-Type -AssemblyName System.IO.Compression.FileSystem

$source = "C:\Users\langt\Herd\thu-huong-cake\laravel"
$dest = "C:\Users\langt\Herd\thu-huong-cake\thu-huong-cake-full.zip"

if (Test-Path $dest) { Remove-Item $dest }

$zip = [System.IO.Compression.ZipFile]::Open($dest, 'Create')

Get-ChildItem -Path $source -Recurse -Force | Where-Object {
    $_.FullName -notlike "*\.git\*" -and $_.FullName -notlike "*\node_modules\*"
} | ForEach-Object {
    if (-not $_.PSIsContainer) {
        $rel = $_.FullName.Substring($source.Length + 1).Replace('\','/')
        try {
            [System.IO.Compression.ZipFileExtensions]::CreateEntryFromFile($zip, $_.FullName, $rel) | Out-Null
        } catch {}
    }
}

$zip.Dispose()
Write-Host "Done! ZIP created at $dest"
