import axios from 'axios'
import { message } from 'laravel-mix/src/Log'
import React, {useEffect, useState} from 'react';
import ReactDOM from 'react-dom';

function Create(props) {
    const [message, setMessage] = useState('')
    const [bands, setBands] = useState([])
    const [albums, setAlbums] = useState([])
    const [bandId, setBandId] = useState('')
    const [albumId, setAlbumId] = useState('')
    const [title, setTitle] = useState('')
    const [body, setBody] = useState('')
    const [errors, SetErrors] = useState([])

    const request = {
        band: bandId,
        album: albumId,
        title,
        body
    }

    const getBands = async () => {
        let response = await axios.get('/admin/band/manage')
        setBands(response.data);
    }

    const getAlbumBySelectedBand = async (e) => {
        setBandId(e.target.value)
        let response = await axios.get(`/admin/album/get-album-by-${e.target.value}`)
        setAlbums(response.data)
    }

    const post = async (e) => {
        e.preventDefault();
        try {
            let response = await axios.post(props.endpoint, request)
            setMessage(response.data.message);
            SetErrors([]);
            setBandId('')
            setAlbumId('')
            setTitle('')
            setBody('')
        } catch (error) {
            SetErrors(e.response.data.errors);
        }
    }

    useEffect(() => {
        getBands()
    }, [])

    return (
        <div>
            {message && <div className='alert alert-success' role='alert'>{message}</div>}
            <div className="card">
                <div className="card-body">
                    <form onSubmit={post}>
                        <div className="mb-3">
                            <label className='form-label' htmlFor="band">Band</label>
                            <select value={bandId} onChange={getAlbumBySelectedBand} className='form-control' id='band' name='band'>
                                <option value="{null}">Chose a Band</option>
                                {
                                    bands.map((band) => {
                                        return <option key={band.id} value={band.id}>{band.band_name}</option>
                                    })
                                }
                            </select>
                            { errors.band ? <div className='text-danger mt-2'>{errors.band[0]}</div> : '' }
                        </div>

                        {
                        albums.length ?
                        <div className="mb-3">
                            <label className='form-label' htmlFor="album">Album</label>
                            <select value={albumId} onChange={(e) => setAlbumId(e.target.value)} name='album' id='album' className='form-control'>
                                    <option value={null}>Choose a Album</option>
                                {
                                    albums.map((album) => {
                                        return <option key={album.id} value={album.id}>{album.album_name}</option>
                                    })
                                }
                            </select>
                            { errors.album ? <div className='text-danger mt-2'>{errors.album[0]}</div> : '' }
                        </div> : ''
                        }

                        <div className="mb-3">
                            <label className='form-label' htmlFor='title'>Title</label>
                            <input type="text" value={title} onChange={(e) => setTitle(e.target.value)}     className='form-control' name='title' id='title'></input>
                            { errors.title ? <div className='text-danger mt-2'>{errors.title[0]}</div> : '' }
                        </div>

                        <div className="mb-3">
                            <label className='form-label' htmlFor='body'>Body</label>
                            <textarea type="text" value={body} onChange={(e) => setBody(e.target.value)}     className='form-control' name='body' id='body' rows='10'></textarea>
                            { errors.body ? <div className='text-danger mt-2'>{errors.body[0]}</div> : '' }
                        </div>
                        <button type='submit' className='btn btn-info btn-sm'>Create</button>
                    </form>
                </div>
            </div>
        </div>
    );
}

export default Create;

if (document.getElementById('create-lyric')) {
    var item = document.getElementById('create-lyric')
    ReactDOM.render(<Create endpoint={item.getAttribute('endpoint')} />, item);
}
