<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;


class FtpController extends Controller
{
    // Afficher la liste des fichiers sur le FTP
    public function listFiles()
    {
        $files = Storage::disk('ftp')->files();
        return view('client.document', compact('files'));
    }


    // Télécharger un fichier
    public function downloadFile($filename)
    {
        if (!Storage::disk('ftp')->exists($filename)) {
            return redirect()->route('ftp.list')->with('error', 'Fichier introuvable.');
        }


        return new StreamedResponse(function () use ($filename) {
            $stream = Storage::disk('ftp')->readStream($filename);
            fpassthru($stream);
            fclose($stream);
        }, 200, [
            "Content-Type" => Storage::disk('ftp')->mimeType($filename),
            "Content-Disposition" => "attachment; filename=\"$filename\""
        ]);
    }


    // Upload d’un fichier
    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240',
        ]);


        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();


        Storage::disk('ftp')->put($fileName, fopen($file->getPathname(), 'r+'));


        return redirect()->route('ftp.list')->with('success', 'Fichier uploadé avec succès !');
    }
}







